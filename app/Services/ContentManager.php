<?php

namespace App\Services;

use App\Models\Content;

class ContentManager
{
    public function getAllContent(): array
    {
        $contents = Content::all();
        $organized = [];

        foreach ($contents as $content) {
            $group = $content->group ?? 'general';
            $organized[$group][$content->key] = $content->value;
        }

        return $organized;
    }

    public function getContentByGroup(string $group): array
    {
        $contents = Content::where('group', $group)->get();
        $organized = [];

        foreach ($contents as $content) {
            $organized[$content->key] = $content->value;
        }

        return $organized;
    }

    public function createIfNotExists(string $key, string $group, string $defaultValue, array $options = []): Content
    {
        $content = Content::firstOrCreate(
            ['key' => $key],
            [
                'group' => $group,
                'value' => $defaultValue,
                'type' => $options['type'] ?? 'text',
                'description' => $options['description'] ?? "Auto-generated content for {$key}"
            ]
        );

        return $content;
    }

    public function findOrCreate(string $key, string $group, string $defaultValue, array $options = []): string
    {
        $content = $this->createIfNotExists($key, $group, $defaultValue, $options);
        return $content->value;
    }
}
