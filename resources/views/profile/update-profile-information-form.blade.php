<!-- Componente de formulario de Jetstream que llama a la función Livewire 'updateProfileInformation' al enviar -->
<x-form-section submit="updateProfileInformation">

    <!-- Título del formulario -->
    <x-slot name="title">
        {{ __('Informacion del Funcionario') }}
    </x-slot>

    <!-- Descripción debajo del título -->
    <x-slot name="description">
        {{ __('Debes llenar los campos con tu informacion para actualizarla.') }}
    </x-slot>

    <!-- Campos del formulario -->
    <x-slot name="form">

        <!-- SECCIÓN: Foto de perfil (si Jetstream maneja fotos) -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">

                <!-- Input oculto de selección de archivo -->
                <input type="file" id="photo" class="hidden"
                       wire:model.live="photo"
                       x-ref="photo"
                       x-on:change="
                            photoName = $refs.photo.files[0].name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                photoPreview = e.target.result;
                            };
                            reader.readAsDataURL($refs.photo.files[0]);
                       " />

                <!-- Etiqueta -->
                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Imagen actual del perfil -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full size-20 object-cover">
                </div>

                <!-- Vista previa de la nueva imagen -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full size-20 bg-cover bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\')'">
                    </span>
                </div>

                <!-- Botón para seleccionar nueva foto -->
                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                <!-- Botón para eliminar la foto actual -->
                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <!-- Error de validación -->
                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- SECCIÓN: Campo Nombre -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Nombre') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- SECCIÓN: Campo Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            <!-- Verificación de correo (si está habilitado) -->
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}
                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>

    </x-slot>

    <!-- BOTÓN GUARDAR -->
    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
