<?php

namespace C6Digital\OgManager\Components;

use C6Digital\OgManager\OgManager;
use Filament\Forms\Components\Group;

class SEO extends Group
{
    protected function setUp(): void
    {
        $this->columns(1);
        $this->relationship('openGraphMeta');
        $this->schema(OgManager::getDefaultFormSchema());
    }
}
