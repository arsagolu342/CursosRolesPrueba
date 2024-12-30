<div class="mt-5 bg-white rounded-lg shadow">
    <div class="flex-1 pl-5 overflow-hidden">
        <hr class="mt-6 border-b-1 border-blueGray-300">
        <h6 class="mt-3 mb-6 text-sm font-bold text-center text-blue-500 uppercase">
            Usuarios del Curso
        </h6>
        <table class="items-center w-full bg-transparent border-collapse">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle bg-blue-100 text-blueGray-500">Usuario</th>
                    <th class="px-6 py-3 text-xs font-semibold text-center uppercase align-middle bg-blue-100 text-blueGray-500">Avance Actual</th>
                    <th class="px-6 py-3 text-xs font-semibold text-center uppercase align-middle bg-blue-100 text-blueGray-500">Total</th>
                </tr>
            </thead>
            <tbody>
                @if (empty($students))
                    <tr>
                        <td colspan="4" class="p-4 text-center text-blueGray-500">No exiten usuarios en este curso.</td>
                    </tr>
                @else
                    @foreach ($students as $index => $item)
                        <tr>
                            <td class="p-4 px-6">
                            {{ $item->user->name }}
                            </td>
                            <td class="p-4 px-6 text-center">
                                {{ $item->progress_count }}
                            </td>
                            <td class="p-4 px-6 text-center">
                                {{ $total }}
                            </td>

                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

    </div>
    <div>
        {{ $students->links() }}
    </div> 
    {{-- Because she competes with no one, no one can compete with her. --}}
</div>
