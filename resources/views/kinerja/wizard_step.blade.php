<div class="row mt-4">
    <div class="col-12 col-lg-8 col-md-12 offset-lg-2">
    <div class="wizard-steps">
        <div class="wizard-step {{session()->has('period_data') ? 'wizard-step-active ':''}}{{set_active_wizard('kinerja.show.period')}}">
        <div class="wizard-step-icon">
            <i class="fas fa-history"></i>
        </div>
        <div class="wizard-step-label">
            Periode Pelaporan
        </div>
        </div>
        <div class="wizard-step {{session()->has('finance_data') ? 'wizard-step-active ':''}}{{set_active_wizard('kinerja.show.finance')}}">
        <div class="wizard-step-icon">
            <i class="fas fa-wallet"></i>
        </div>
        <div class="wizard-step-label">
            Data Keuangan
        </div>
        </div>
        <div class="wizard-step {{session()->has('service_data') ? 'wizard-step-active ':''}}{{set_active_wizard('kinerja.show.service')}}">
        <div class="wizard-step-icon">
            <i class="fas fa-hand-holding-heart"></i>
        </div>
        <div class="wizard-step-label">
            Data Pelayanan
        </div>
        </div>
        <div class="wizard-step {{session()->has('production_data') ? 'wizard-step-active ':''}}{{set_active_wizard('kinerja.show.production')}}">
            <div class="wizard-step-icon">
                <i class="fas fa-tint"></i>
            </div>
            <div class="wizard-step-label">
            Data Produksi
            </div>
        </div>
        <div class="wizard-step {{session()->has('resource_data') ? 'wizard-step-active ':''}}{{set_active_wizard('kinerja.show.resource')}}">
            <div class="wizard-step-icon">
            <i class="fas fa-users"></i>
            </div>
            <div class="wizard-step-label">
            Data SDM
            </div>
        </div>
    </div>
    </div>
</div>