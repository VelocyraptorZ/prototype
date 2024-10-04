<div class="p-4">
    <label>Select Company</label>
    @livewire('autocomplete',['table'=>'companies', 'event'=>'sellerCompanySelected', 'createComponent'=>'company.form'])
</div>