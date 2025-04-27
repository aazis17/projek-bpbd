<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\ApplicationStatsOverview;
use App\Filament\Widgets\ApplicationPieChart;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    
    // Pastikan getColumns kompatibel dengan BaseDashboard
    public function getColumns(): int|array
    {
        return 2; // Ini bisa berupa integer saja jika itu yang dibutuhkan
    }
    
    public function getWidgets(): array
    {
        return [
            ApplicationPieChart::class,
            ApplicationStatsOverview::class,
        ];
    }
}