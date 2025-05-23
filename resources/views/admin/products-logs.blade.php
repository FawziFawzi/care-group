<x-admin.layout>
    <h5 class="mb-3">PRODUCT LOGS</h5>
    <div class="card tbl-card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-borderless " style="border-collapse: separate; border-spacing: 0 10px;">
                    <thead>
                    @if($logs->count() == 0)
                        <h5>No Order LOGS Yet!</h5>
                    @else
                        <tr>
                            <th>PRODUCT NAME</th>
                            <th>ACTION</th>
                            <th>Changes</th>
                            <th>ADMIN NAME</th>
                            <th>TIMESTAMP</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($logs as $log )
                        <tr>
                            <td>{{ $log->product->name ?? 'Deleted Product' }}</td>
                            <td>{{ $log->action }}</td>
                            <td>
                                <div class="changes-container">
                                    @foreach($log->changes as $field => $change)
                                        <div class="change-item mb-2">
                                            <strong>{{ str_replace('_', ' ', ucfirst($field)) }}:</strong>
                                            @if(isset($change['old']))
                                                <span class="text-danger">{{ $change['old'] }}</span> →
                                            @endif
                                            @if(isset($change['new']))
                                                <span class="text-success">{{ $change['new'] }}</span>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                            <td>{{ $log->changer->name }}</td>
                            <td>{{ $log->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
</x-admin.layout>
