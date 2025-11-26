<div class="space-y-4">
    @if (session()->has('message'))
        <div class="rounded-md bg-green-50 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">
                        {{ session('message') }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    <div class="rounded-lg border border-gray-200 bg-white p-6">
        <label class="block text-sm font-medium text-gray-700 mb-4">
            🖼️ Logo Sekolah
        </label>
        
        @if ($currentLogo && Storage::disk('public')->exists($currentLogo))
            <div class="mb-6 flex items-start gap-4">
                <img src="{{ Storage::url($currentLogo) }}" alt="Current Logo" class="h-32 w-auto rounded-lg border-2 border-gray-300 shadow-sm">
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-700 mb-2">Logo saat ini</p>
                    <button wire:click="deleteLogo" type="button" class="inline-flex items-center px-3 py-2 border border-red-300 shadow-sm text-sm font-medium rounded-md text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Hapus Logo
                    </button>
                </div>
            </div>
        @elseif ($currentLogo)
            <div class="mb-4 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                <p class="text-sm text-yellow-800">⚠️ Logo tidak ditemukan. Silakan upload logo baru.</p>
            </div>
        @endif

        <div class="mt-4">
            <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-gray-400 transition-colors bg-gray-50">
                <input 
                    type="file" 
                    wire:model="logo" 
                    accept="image/*"
                    id="logo-upload"
                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                >
                
                <div class="space-y-3">
                    <div class="flex justify-center">
                        <svg class="h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    
                    <div>
                        <label for="logo-upload" class="cursor-pointer">
                            <span class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                Pilih File
                            </span>
                        </label>
                        <p class="mt-1 text-xs text-gray-500">atau drag & drop file di sini</p>
                    </div>
                    
                    <p class="text-xs text-gray-500">
                        Format: JPG, PNG, GIF • Maksimal 2MB
                    </p>
                </div>
            </div>
            
            @error('logo') 
                <div class="mt-2 flex items-center text-sm text-red-600">
                    <svg class="h-5 w-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    {{ $message }}
                </div>
            @enderror
            
            @if ($logo)
                <div class="mt-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                    <p class="text-sm font-medium text-blue-900 mb-3">Preview Logo Baru:</p>
                    <div class="flex items-center gap-4">
                        <img src="{{ $logo->temporaryUrl() }}" class="h-32 w-auto rounded-lg border-2 border-blue-300 shadow-sm">
                        <div class="flex-1">
                            <div class="flex items-center text-blue-700">
                                <svg class="animate-spin h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span class="text-sm">Mengupload...</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
