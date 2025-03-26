<x-layout title="products">
    <h3 style="padding: 30px;">Ini adalah halaman Products</h3>
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="card border border-2 p-2" style="width: 18rem;">
                    <img src="https://p3-ofp.static.pub//fes/cms/2024/09/12/5z9tmhn7ida0siqrnpk5w9uagca2t1582831.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title m-0">Legion 5i</h5>
                            <h6 class="card-title text-danger m-0">RP.19,999,999</h6>
                        </div>
                        <p class="card-text mt-4">Lihat selengkapya...</p>
                        <div class="liveAlertPlaceholder"></div>
                        <button type="button" class="btn btn-primary liveAlertBtn">+ CheckOut</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border border-2 p-2" style="width: 18rem;">
                    <img src="https://p3-ofp.static.pub//fes/cms/2024/09/12/5z9tmhn7ida0siqrnpk5w9uagca2t1582831.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title m-0">Legion 5i</h5>
                            <h6 class="card-title text-danger m-0">RP.19,999,999</h6>
                        </div>
                        <p class="card-text mt-4">Lihat selengkapya...</p>
                        <div class="liveAlertPlaceholder"></div>
                        <button type="button" class="btn btn-primary liveAlertBtn">+ CheckOut</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border border-2 p-2" style="width: 18rem;">
                    <img src="https://p3-ofp.static.pub//fes/cms/2024/09/12/5z9tmhn7ida0siqrnpk5w9uagca2t1582831.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title m-0">Legion 5i</h5>
                            <h6 class="card-title text-danger m-0">RP.19,999,999</h6>
                        </div>
                        <p class="card-text mt-4">Lihat selengkapya...</p>
                        <div class="liveAlertPlaceholder"></div>
                        <button type="button" class="btn btn-primary liveAlertBtn">+ CheckOut</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border border-2 p-2" style="width: 18rem;">
                    <img src="https://p3-ofp.static.pub//fes/cms/2024/09/12/5z9tmhn7ida0siqrnpk5w9uagca2t1582831.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title m-0">Legion 5i</h5>
                            <h6 class="card-title text-danger m-0">RP.19,999,999</h6>
                        </div>
                        <p class="card-text mt-4">Lihat selengkapya...</p>
                        <div class="liveAlertPlaceholder"></div>
                        <button type="button" class="btn btn-primary liveAlertBtn">+ CheckOut</button>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('click', function(event) {
                    if (event.target.classList.contains('liveAlertBtn')) {

                        const card = event.target.closest('.card');
                        const alertPlaceholder = card.querySelector('.liveAlertPlaceholder');

                        const appendAlert = (message, type) => {
                            const wrapper = document.createElement('div');
                            wrapper.innerHTML = `
                    <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                        <div>${message}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
                            alertPlaceholder.innerHTML = '';
                            alertPlaceholder.append(wrapper);
                        };

                        appendAlert('Berhasil masukan ke Keranjang', 'success');
                    }
                });
            </script>

        </div>
    </div>
</x-layout>