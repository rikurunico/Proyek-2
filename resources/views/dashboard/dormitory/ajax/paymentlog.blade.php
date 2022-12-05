<style>
    a.m-0.text-nowrap.font-weight-bold.text-primary:hover{
        color: blue !important;
        text-decoration: underline;
    }
    a.m-0.text-nowrap.font-weight-bold.text-primary.active{
        color: red !important;
        text-decoration: underline;
    }
    .border-black-solid{
        border: 1px solid black;
    }
    .month-box.text-nowrap:hover{
        text-decoration: underline;
    }
</style>
<div class="card shadow border-1 border-primary p-0 w-100">
    <div class="card-header">
        <div class="d-flex py-2 w-100 overflow-auto">
            @for ($i = $year_checkin; $i <= 2025; $i++)
                <a role="button" class="text-center m-0 text-nowrap font-weight-bold text-primary {{ $i == 2025 ? "" : "mr-5" }}">{{ $i }}</a>
            @endfor
        </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="d-flex flex-column flex-md-row w-100 overflow-auto py-0 px-0 py-md-2" id="month-body">
            asdasd
        </div>
    </div>
</div>
<script>
    console.log("ok")
    const headerYear = document.querySelectorAll("a.m-0.text-nowrap.font-weight-bold.text-primary");
    const containerMonth = document.getElementById("month-body");

    let year_now = new Date().getFullYear();
    let urlajax = "{{ route("dormitory.index") }}";
    let dormitory_id = {{ $dormitory_id }}

    headerYear.forEach(element => {
        if (element.text == year_now) {
            element.classList.add("active");
        }
    });

    headerYear.forEach(element => {
        element.addEventListener("click", () => {
            let yearActive = document.querySelector("a.m-0.text-nowrap.font-weight-bold.text-primary.active")
            yearActive.classList.remove("active");
            element.classList.toggle("active");
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    containerMonth.innerHTML = xhr.responseText;
                }
            };
            
            xhr.open("GET", urlajax + "/payment/" + dormitory_id + "/year/" + element.text , true);
            
            xhr.send();
        })
    });
</script>
