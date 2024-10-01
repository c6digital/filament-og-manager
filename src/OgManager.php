<?php

namespace C6Digital\OgManager;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class OgManager
{
    public static function getDefaultFormSchema(): array
    {
        return [
            TextInput::make('title')
                ->required()
                ->helperText('The title of the site.'),
            Textarea::make('description')
                ->nullable()
                ->helperText('A snippet of text that describes the site\'s content and purpose. Recommended maximum length: 200 characters.'),
            FileUpload::make('image')
                ->nullable()
                ->image()
                ->helperText('Recommended size: 1200x630px or a 1.91:1 aspect ratio.'),
            Select::make('twitter_card_style')
                ->options([
                    'summary' => 'Summary',
                    'summary_large_image' => 'Summary with Large Image',
                ])
                ->label('Twitter / X Card Style')
                ->helperText('"Summary" shows a smaller square image, while "Summary with Large Image" shows a larger rectangular image.')
                ->default('summary_large_image'),
        ];
    }
}
