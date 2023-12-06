<!-- resources/views/dashboard.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Digital Marketing Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Digital Marketing Dashboard</h1>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Platforms</th>
                    <th>Total Impressions</th>
                    <th>Total Clicks</th>
                    <th>Total Spend</th>
                    <th>Total Revenue</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ads->groupBy('platform') as $platform => $data)
                <tr>
                    <td>{{ $platform }}</td>
                    <td>{{ $data->sum('impressions') }}</td>
                    <td>{{ $data->sum('clicks') }}</td>
                    <td>{{ $data->sum('spend') }}</td>
                    <td>{{ $data->sum('revenue') }}</td>
                    <td>
                        <a href="{{ route('platform.metrics', ['platform' => $platform]) }}" target="_blank" class="btn btn-success">Show Metrics</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>