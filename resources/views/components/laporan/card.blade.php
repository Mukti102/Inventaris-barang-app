@props(['title' => null, 'route' => null, 'cardColor' => 'card-primary', 'icon' => 'fas fa-file-alt', 'description' => 'Lihat data lengkap dan detail dari laporan ini.'])

<div class="card {{ $cardColor }} shadow-lg rounded-4 mb-4 h-100 overflow-hidden position-relative card-hover-effect">
    <!-- Decorative gradient overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-gradient-subtle opacity-10"></div>
    
    <!-- Card Header -->
    <div class="card-header border-0 bg-gradient-light position-relative z-1">
        <div class="d-flex align-items-center">
            <div class="icon-wrapper me-3">
                <div class="icon-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center">
                    <i class="{{ $icon }} text-primary fs-5"></i>
                </div>
            </div>
            <div class="me-3 text-black">
               {{$title}}
            </div>
        </div>
    </div>
    
    <!-- Card Body -->
    <div class="card-body d-flex flex-column justify-content-between position-relative z-1">
        <div class="flex-grow-1">
            <p class="text-muted mb-3 lh-sm">{{ $description }}</p>
            
            <!-- Stats or additional info could go here -->
            <div class="d-flex align-items-center mb-3">
                <div class="badge bg-light text-dark me-2">
                    <i class="fas fa-clock me-1"></i>
                    <small>Updated recently</small>
                </div>
            </div>
        </div>
        
        <!-- Action Button -->
        <div class="mt-auto">
            <a href="{{ route($route) }}" class="btn btn-primary btn-sm rounded-pill px-4 py-2 fw-semibold text-decoration-none d-inline-flex align-items-center transition-all">
                <span class="me-2">Lihat Data</span>
                <i class="fas fa-arrow-right transition-transform"></i>
            </a>
        </div>
    </div>
    
    <!-- Decorative corner element -->
    <div class="position-absolute top-0 end-0 p-3 opacity-25">
        <i class="fas fa-chart-line fs-1 text-primary"></i>
    </div>
</div>

<style>
.card-hover-effect {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid rgba(0, 0, 0, 0.08);
}

.card-hover-effect:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15) !important;
    border-color: rgba(var(--bs-primary-rgb), 0.3);
}

.icon-circle {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    transition: all 0.3s ease;
}

.card-hover-effect:hover .icon-circle {
    transform: scale(1.1);
    background: rgba(var(--bs-primary-rgb), 0.2) !important;
}

.bg-gradient-light {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.bg-gradient-subtle {
    background: linear-gradient(135deg, rgba(var(--bs-primary-rgb), 0.05) 0%, rgba(var(--bs-primary-rgb), 0.02) 100%);
}

.transition-all {
    transition: all 0.3s ease;
}

.transition-transform {
    transition: transform 0.3s ease;
}

.card-hover-effect:hover .transition-transform {
    transform: translateX(4px);
}

.card-hover-effect:hover .btn-primary {
    background: linear-gradient(135deg, var(--bs-primary) 0%, rgba(var(--bs-primary-rgb), 0.8) 100%);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(var(--bs-primary-rgb), 0.3);
}

.rounded-4 {
    border-radius: 1rem !important;
}

.rounded-pill {
    border-radius: 50rem !important;
}

/* Card color variants */
.card-primary {
    --bs-primary-rgb: 13, 110, 253;
}

.card-success {
    --bs-primary-rgb: 25, 135, 84;
}

.card-warning {
    --bs-primary-rgb: 255, 193, 7;
}

.card-danger {
    --bs-primary-rgb: 220, 53, 69;
}

.card-info {
    --bs-primary-rgb: 13, 202, 240;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .card-hover-effect:hover {
        transform: none;
    }
    
    .icon-circle {
        width: 40px;
        height: 40px;
    }
    
    .card-title {
        font-size: 1.1rem;
    }
}
</style>