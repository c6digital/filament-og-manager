<?php

namespace C6Digital\OgManager\Pages;

use C6Digital\OgManager\Models\Meta;
use C6Digital\OgManager\OgManager;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class SEO extends Page
{
    protected static string $view = 'og-manager::pages.seo';

    protected static ?string $title = 'SEO';

    protected static ?string $navigationIcon = 'heroicon-o-magnifying-glass-circle';

    public $siteSettings;

    public function mount()
    {
        $siteSettings = [];

        if ($meta = Meta::query()->whereNull('metable_type')->first()) {
            $siteSettings = [
                'title' => $meta->title,
                'description' => $meta->description,
                'image' => $meta->image,
                'twitter_card_style' => $meta->twitter_card_style,
            ];
        }

        $this->siteSettingsForm->fill($siteSettings);
    }

    public function siteSettingsForm(Form $form): Form
    {
        return $form
            ->statePath('siteSettings')
            ->schema([
                Section::make()
                    ->id('site-settings')
                    ->schema(fn () => OgManager::getDefaultFormSchema())
                    ->footerActions([
                        Action::make('save')
                            ->submit('siteSettings')
                            ->label('Save'),
                    ]),
            ]);
    }

    public function saveSiteSettings()
    {
        $state = $this->siteSettingsForm->getState();

        Meta::query()
            ->updateOrCreate([
                'metable_type' => null,
            ], [
                'metable_id' => null,
                'title' => $state['title'],
                'description' => $state['description'],
                'image' => $state['image'],
                'twitter_card_style' => $state['twitter_card_style'],
            ]);

        Notification::make()
            ->title('Site settings saved!')
            ->success()
            ->send();
    }

    protected function getForms(): array
    {
        return ['siteSettingsForm'];
    }
}
