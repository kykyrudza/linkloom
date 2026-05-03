<?php

namespace App\Http\Controllers;

use App\Http\Requests\SocialLinks\FetchSocialNicknameRequest;
use App\Http\Requests\SocialLinks\StoreSocialLinkRequest;
use App\Models\SocialLink;
use App\Services\SocialLinkService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function __construct(private readonly SocialLinkService $socialLinks) {}

    public function store(StoreSocialLinkRequest $request): RedirectResponse
    {
        $this->socialLinks->createForUser($request->user(), $request->validated());

        return redirect()->back()->with('success', 'Social link added successfully.');
    }

    public function destroy(Request $request, SocialLink $socialLink): RedirectResponse
    {
        $this->socialLinks->deleteForUser($request->user(), $socialLink);

        return redirect()->back()->with('success', 'Social link removed successfully.');
    }

    public function fetchNickname(FetchSocialNicknameRequest $request): JsonResponse
    {
        $data = $request->validated();

        return response()->json([
            'nickname' => $this->socialLinks->extractNickname($data['platform'], $data['url']),
        ]);
    }
}
