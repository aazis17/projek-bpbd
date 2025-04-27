<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Carbon\Carbon;
use App\Models\Submission;

class ApplicationPieChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Pengajuan';
    
    // Atur lebar widget agar seimbang dengan stats
    // protected int|string|array $columnSpan = 1;
    
    protected static ?array $options = [
        'plugins' => [
            'legend' => [
                'display' => true,
            ],
        ],
    ];
    
    protected function getType(): string
    {
        return 'doughnut';
    }
    
    protected function getData(): array
    {
        $pendingCount = Submission::where('status', 'pending')->count();
        $approvedCount = Submission::where('status', 'approved')->count();
        $rejectedCount = Submission::where('status', 'rejected')->count();
        $totalCount = $approvedCount + $rejectedCount;

        $acceptanceRate = $totalCount > 0 ? round(($approvedCount / $totalCount) * 100) : 0;

        return [
            'datasets' => [
                [
                    'data' => [$pendingCount, $approvedCount, $rejectedCount],
                    'backgroundColor' => ['#f5a020', '#10b981', '#ef4444'],
                ],
            ],
            'labels' => ['Menunggu', 'Diterima', 'Ditolak'],
        ];
    }
    
    protected function getFooter(): string
    {
        $approvedCount = Submission::where('status', 'approved')->count();
        $totalCount = Submission::count();
        $acceptanceRate = $totalCount > 0 ? round(($approvedCount / $totalCount) * 100) : 0;

        return "Tanggal: " . Carbon::now()->format('d M Y') . " | {$acceptanceRate}% tingkat penerimaan";
    }
}