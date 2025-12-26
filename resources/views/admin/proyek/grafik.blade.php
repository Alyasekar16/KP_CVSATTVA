@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>📊 Jumlah Proyek per Kategori</h2>
        <a href="{{ route('proyek.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <canvas id="proyekChart" height="120"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('proyekChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($data->pluck('kategoriproyek')) !!},
            datasets: [{
                label: 'Jumlah Proyek',
                data: {!! json_encode($data->pluck('total')) !!},
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 159, 64, 0.6)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
@endsection