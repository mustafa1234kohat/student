<x-app-layout>
 <div  style="width: 400px" class="w-[200px] mx-auto mt-10 bg-white shadow-lg rounded-lg p-6 flex flex-col gap-5">
    <div class="flex gap-5"><input type="text"  id="studentNameF"  class=" text-sm border rounded px-2 py-1 focus:ring focus:ring-blue-200 mr-5" placeholder="First Name"><input type="text" id="studentNameL"  class="ml-5 text-sm border rounded px-2 py-1 focus:ring focus:ring-blue-200" placeholder="Last Name"></div>
    <input type="email" id="studentEmail"  class="w-full text-sm border rounded px-2 py-1 focus:ring focus:ring-blue-200">
    <input type="password" id="studentPassword"  placeholder="p
Password">
<select id="role"><option value="admin">Admin</option><option value="student">Student</option></select>
    <input type="file" id="studentImage"  >
    <textarea name="" id="studentAddress"  class="w-full text-sm border rounded px-2 py-1 focus:ring focus:ring-blue-200" placeholder="Address"></textarea>
    <input id="saveStudentBtn" type="submit" value="Add Student" class="cursor-pointer  text-sm border rounded px-2 py-1 focus:ring focus:ring-blue-200">
 </div>

 @vite(['resources/js/app.js'])

    <script>
        document.getElementById('saveStudentBtn').addEventListener('click', function () {
            const fname = document.getElementById('studentNameF').value.trim();
            const lname = document.getElementById('studentNameL').value.trim();
            const email = document.getElementById('studentEmail').value.trim();
            const password = document.getElementById('studentPassword').value.trim();
            const image = document.getElementById('studentImage').value.trim();
const address = document.getElementById('studentAddress').value.trim();
const role = document.getElementById('role').value.trim();

            if (!fname) {
                alert('Please fill inputs');
                return;
            }

            axios.post("{{ route('students.store') }}", {
                first_name: fname,
                last_name: lname,
                email: email,
                password: password,
                image: image,
                address: address,
                role: role
            })
            .then(response => {
                console.log(response)
                
            })
            .catch(error => {
                console.error(error);
                alert(error)
            });
        });
    </script>
</x-app-layout>