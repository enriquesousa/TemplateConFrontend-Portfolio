{{-- Table --}}
<div class="table-responsive">
    <table class="table table-vcenter card-table">

        <thead>
            <tr>
                <th>Columna 1</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($users as $item)

                <tr>

                    {{-- Columna 1 --}}
                    <td>
                        {{ $item->name }}
                    </td>

                    {{-- Acciones --}}
                    <td>
                        
                    </td>

                </tr>
                
            @empty
                <tr colspan="3">
                    {{ __('No data available in table') }}
                </tr>
            @endforelse
            
        </tbody>

    </table>
</div>