<?php
namespace App\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialLinkController extends Controller
{
    public function store(Request $request)
    {
        $platforms = [
            'facebook', 'twitter', 'linkedin', 'instagram', 'youtube', 'github',
            'pinterest', 'snapchat', 'tumblr', 'reddit', 'tiktok', 'whatsapp',
            'vimeo', 'flickr', 'telegram'
        ];

        $request->validate([
            'platform' => 'required|string|in:' . implode(',', $platforms),
            'url' => [
                'required',
                'url',
                function ($attribute, $value, $fail) use ($request) {
                    $platform = $request->input('platform');
                    $urlPatterns = [
                        'facebook' => '/^(https?:\/\/)?(www\.)?facebook\.com\/.*$/',
                        'twitter' => '/^(https?:\/\/)?(www\.)?twitter\.com\/.*$/',
                        'linkedin' => '/^(https?:\/\/)?(www\.)?linkedin\.com\/.*$/',
                        'instagram' => '/^(https?:\/\/)?(www\.)?instagram\.com\/.*$/',
                        'youtube' => '/^(https?:\/\/)?(www\.)?youtube\.com\/.*$/',
                        'github' => '/^(https?:\/\/)?(www\.)?github\.com\/.*$/',
                        'pinterest' => '/^(https?:\/\/)?(www\.)?pinterest\.com\/.*$/',
                        'snapchat' => '/^(https?:\/\/)?(www\.)?snapchat\.com\/.*$/',
                        'tumblr' => '/^(https?:\/\/)?(www\.)?tumblr\.com\/.*$/',
                        'reddit' => '/^(https?:\/\/)?(www\.)?reddit\.com\/.*$/',
                        'tiktok' => '/^(https?:\/\/)?(www\.)?tiktok\.com\/.*$/',
                        'whatsapp' => '/^(https?:\/\/)?(www\.)?wa\.me\/.*$/',
                        'vimeo' => '/^(https?:\/\/)?(www\.)?vimeo\.com\/.*$/',
                        'flickr' => '/^(https?:\/\/)?(www\.)?flickr\.com\/.*$/',
                        'telegram' => '/^(https?:\/\/)?(www\.)?t\.me\/.*$|^(https?:\/\/)?(www\.)?telegram\.me\/.*$/'
                    ];

                    if (isset($urlPatterns[$platform]) && !preg_match($urlPatterns[$platform], $value)) {
                        $fail('The URL must be a valid ' . ucfirst($platform) . ' URL.');
                    }
                }
            ],
        ]);

        $user = Auth::user();

        if ($user->socialLinks()->count() >= 6) {
            return redirect()->back()->withErrors(['error' => 'You cannot add more than 6 social links.']);
        }

        SocialLink::create([
            'user_id' => $user->id,
            'platform' => $request->input('platform'),
            'url' => $request->input('url'),
        ]);

        return redirect()->back()->with('success', 'Social link added successfully.');
    }
}
