<div class="container mt-5">
    <div class="row g-4 justify-content-center">

        
        <div class="col-md-4">
            <div class="card text-center shadow border-0">
                <div class="card-body">
                    <div class="icon-circle bg-primary text-white mb-3 mx-auto d-flex align-items-center justify-content-center" style="width: 70px; height: 70px; border-radius: 50%;">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <span class="badge text-bg-primary fs-5 fw-bold">Total de Familias</span>
                    <p class="card-text display-4 text-dark">{{ $familiasTotal }}</p>
                </div>
            </div>
        </div>

    
        <div class="col-md-4">
            <div class="card text-center shadow border-0">
                <div class="card-body">
                    <div class="icon-circle bg-success text-white mb-3 mx-auto d-flex align-items-center justify-content-center" style="width: 70px; height: 70px; border-radius: 50%;">
                        <i class="fas fa-home fa-2x"></i>
                    </div>
                    <span class="badge text-bg-success fs-5 fw-bold">Total de Viviendas</span>
                    <p class="card-text display-4 text-dark">{{ $viviendasTotal }}</p>
                </div>
            </div>
        </div>

        
        <div class="col-md-4">
            <div class="card text-center shadow border-0">
                <div class="card-body">
                    <div class="icon-circle bg-danger text-white mb-3 mx-auto d-flex align-items-center justify-content-center" style="width: 70px; height: 70px; border-radius: 50%;">
                        <i class="fas fa-user-friends fa-2x"></i>
                    </div>
                    <span class="badge text-bg-danger fs-5 fw-bold">Total de Habitantes</span>
                    <p class="card-text display-4 text-dark">{{ $habitantesTotal }}</p>
                </div>
            </div>
        </div>

    </div>
</div>
