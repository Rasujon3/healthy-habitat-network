@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 px-4">
                <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>

                <!-- Key Metrics Cards -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-3">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body text-center">
                                <div class="metric-icon mb-3 rounded-circle bg-success-subtle p-3 mx-auto" style="width: 60px; height: 60px;">
                                    <i class="bi bi-box-seam text-success fs-4"></i>
                                </div>
                                <h5 class="card-title">Total Products</h5>
                                <p class="card-text fw-bold fs-2">{{ $totalProducts ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body text-center">
                                <div class="metric-icon mb-3 rounded-circle bg-primary-subtle p-3 mx-auto" style="width: 60px; height: 60px;">
                                    <i class="bi bi-hand-thumbs-up text-primary fs-4"></i>
                                </div>
                                <h5 class="card-title">Products Voted</h5>
                                <p class="card-text fw-bold fs-2">{{ $totalProductVoted ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body text-center">
                                <div class="metric-icon mb-3 rounded-circle bg-warning-subtle p-3 mx-auto" style="width: 60px; height: 60px;">
                                    <i class="bi bi-geo-alt text-warning fs-4"></i>
                                </div>
                                <h5 class="card-title">Area Votes</h5>
                                <p class="card-text fw-bold fs-2">{{ $totalOwnAreaVotes ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body text-center">
                                <div class="metric-icon mb-3 rounded-circle bg-info-subtle p-3 mx-auto" style="width: 60px; height: 60px;">
                                    <i class="bi bi-people text-info fs-4"></i>
                                </div>
                                <h5 class="card-title">Active Users</h5>
                                <p class="card-text fw-bold fs-2">{{ $activeUsers ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row -->
                <div class="row mb-4">
                    <!-- Vote Statistics Chart -->
                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white border-0">
                                <h5 class="card-title mb-0">Vote Statistics</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="voteStatsChart" height="250"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Resident Interest by Area Chart -->
                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white border-0">
                                <h5 class="card-title mb-0">Resident Interest by Area</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="residentInterestChart" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity and Profile Section -->
                <div class="row">
                    <!-- Recent Activity -->
                    <div class="col-md-8 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Recent Activity</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0">
                                        <thead class="table-light">
                                        <tr>
                                            <th>Product</th>
                                            <th>Type</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($recentActivities) && count($recentActivities) > 0)
                                            @foreach($recentActivities as $activity)
                                                <tr>
                                                    <td>{{ $activity->product_name ?? 'Unknown Product' }}</td>
                                                    <td>{{ $activity->type ?? 'Vote' }}</td>
                                                    <td>{{ isset($activity->created_at) ? $activity->created_at->format('M d, Y') : 'N/A' }}</td>
                                                    <td>
                                                        <span class="badge bg-success">Completed</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4" class="text-center">No recent activities found</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Info -->
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white border-0">
                                <h5 class="card-title mb-0">Profile Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <div class="avatar-placeholder bg-primary-subtle rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 100px; height: 100px;">
                                        <span class="text-primary fw-bold fs-1">{{ substr($authInfo->name ?? 'U', 0, 1) }}</span>
                                    </div>
                                    <h5 class="mb-1">{{ $authInfo->name ?? 'User' }}</h5>
                                    <p class="text-muted mb-0">{{ $authInfo->email ?? 'email@example.com' }}</p>
                                </div>

                                <div class="mb-3">
                                    <strong>Area:</strong> {{ !empty($areaName) ? $areaName : 'Not specified' }}
                                </div>

                                <div class="mb-3">
                                    <strong>Member Since:</strong> {{ isset($authInfo->created_at) ? $authInfo->created_at->format('M d, Y') : 'N/A' }}
                                </div>
                                @if(Auth::user()->resident)
                                <div class="mb-3">
                                    <strong>Total Votes:</strong> {{ $userTotalVotes ?? 0 }}
                                </div>
                                @endif
{{--
                                <hr><div class="d-grid gap-2">
                                    <a href="#" class="btn btn-outline-primary">Edit Profile</a>
                                </div>
--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Vote Statistics Chart
            var voteStatsCtx = document.getElementById('voteStatsChart').getContext('2d');
            var voteStatsChart = new Chart(voteStatsCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($voteStats['labels'] ?? ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']) !!},
                    datasets: [{
                        label: 'Votes',
                        data: {!! json_encode($voteStats['data'] ?? [0, 0, 0, 0, 0, 0]) !!},
                        fill: false,
                        borderColor: '#0d6efd',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Resident Interest by Area Chart
            var residentInterestCtx = document.getElementById('residentInterestChart').getContext('2d');
            var residentInterestChart = new Chart(residentInterestCtx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($areaInterest['labels'] ?? ['No Data']) !!},
                    datasets: [{
                        label: 'Interest Level',
                        data: {!! json_encode($areaInterest['data'] ?? [0]) !!},
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

    <style>
        .metric-icon {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bg-success-subtle {
            background-color: rgba(25, 135, 84, 0.1);
        }

        .bg-primary-subtle {
            background-color: rgba(13, 110, 253, 0.1);
        }

        .bg-warning-subtle {
            background-color: rgba(255, 193, 7, 0.1);
        }

        .bg-info-subtle {
            background-color: rgba(13, 202, 240, 0.1);
        }
    </style>
@endsection
