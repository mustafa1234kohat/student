 
    <x-app-layout>

    @php
        // Get today's short day name (e.g., Mon, Tue, Wed)
        $today = now()->format('D');
        $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
    @endphp
    @php 
$students = [
        (object)[ 'id' => 1, 'name' => 'Ali Khan' ],
        (object)[ 'id' => 2, 'name' => 'Sara Ahmed' ],
        (object)[ 'id' => 3, 'name' => 'Bilal Hassan' ],
        (object)[ 'id' => 4, 'name' => 'Zain Malik' ],
        (object)[ 'id' => 5, 'name' => 'Fatima Noor' ],
    ];
    @endphp
    <div class="max-w-6xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-700">Weekly Attendance</h2>

        <form action="" method="POST">
            @csrf

            <table class="min-w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100 text-gray-800">
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Name</th>
                        @foreach ($days as $day)
                            <th class="border px-4 py-2 text-center">{{ $day }}</th>
                        @endforeach
                    </tr>
                </thead>

                <tbody>
                    @foreach ($students as $student)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2 text-center">{{ $student->id }}</td>
                            <td class="border px-4 py-2">{{ $student->name }}</td>

                            @foreach ($days as $day)
                                <td class="border px-4 py-2 text-center relative">
                                    <div class="flex items-center justify-center gap-3">
                                        <input
                                            type="checkbox"
                                            name="attendance[{{ $student->id }}][{{ $day }}]"
                                            {{ $day !== $today ? 'disabled opacity-40 cursor-not-allowed' : '' }}
                                            class="w-5 h-5 text-blue-600 rounded focus:ring-blue-400"
                                        >

                                        @if ($day == $today)
                                            <div 
                                                class="cursor-pointer text-blue-600 hover:text-blue-800"
                                                onclick="commentBoxOpen('{{ $student->id }}')"
                                            >
                                                <i class="fa-solid fa-message"></i>
                                            </div>

                                            <div 
                                                id="commentBox_{{ $student->id }}"
                                                class="absolute top-10 left-1/2 z-10 -translate-x-1/2 bg-white border border-gray-300 rounded-lg shadow-md p-2 hidden w-40"
                                            >
                                                <input 
                                                    type="text" 
                                                    name="comment[{{ $student->id }}]" 
                                                    placeholder="Write comment..."
                                                    class="w-full text-sm border rounded px-2 py-1 focus:ring focus:ring-blue-200"
                                                >
                                                <button 
                                                    type="button"
                                                    class="bg-blue-600 text-white px-2 py-1 rounded text-xs mt-2 w-full"
                                                    onclick="commentBoxClose('{{ $student->id }}')"
                                                >
                                                    Save
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center mt-6">
                <button 
                    type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow-md"
                >
                    Save Attendance
                </button>
            </div>
        </form>
    </div>

    <script>
        function commentBoxOpen(studentId) {
            document.getElementById('commentBox_' + studentId).classList.remove('hidden');
        }

        function commentBoxClose(studentId) {
            document.getElementById('commentBox_' + studentId).classList.add('hidden');
        }
    </script>
</x-app-layout>
