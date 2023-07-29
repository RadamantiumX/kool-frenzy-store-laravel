<style>
    .profile-title{
        display: flex;
        flex-direction: column;
        text-align: center;
    }

    .profile-title h3{
        font-family: 'Permanent Marker', cursive;
        font-size: 25px;
    }
</style>

<x-app-layout>
    <div class="profile-title"><h3>Panel del usuario</h3></div>
    
    <div x-data="{
            flashMessage: '{{\Illuminate\Support\Facades\Session::get('flash_message')}}',
            init() {
                if (this.flashMessage) {
                    setTimeout(() => this.$dispatch('notify', {message: this.flashMessage}), 200)
                }
            }
        }" class="container mx-auto lg:w-2/3 p-1">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
            <div class="bg-white p-3 shadow rounded-lg md:col-span-2">
                <form x-data="{
                    countries: {{ json_encode($countries) }},
                    billingAddress: {{ json_encode([
                        'address1' => old('billing.address1', $billingAddress->address1),
                        'address2' => old('billing.address2', $billingAddress->address2),
                        'city' => old('billing.city', $billingAddress->city),
                        'state' => old('billing.state', $billingAddress->state),
                        'country_code' => old('billing.country_code', $billingAddress->country_code),
                        'zipcode' => old('billing.zipcode', $billingAddress->zipcode),
                    ]) }},
                    shippingAddress: {{ json_encode([
                        'address1' => old('shipping.address1', $shippingAddress->address1),
                        'address2' => old('shipping.address2', $shippingAddress->address2),
                        'city' => old('shipping.city', $shippingAddress->city),
                        'state' => old('shipping.state', $shippingAddress->state),
                        'country_code' => old('shipping.country_code', $shippingAddress->country_code),
                        'zipcode' => old('shipping.zipcode', $shippingAddress->zipcode),
                    ]) }},
                    get billingCountryStates() {
                        const country = this.countries.find(c => c.code === this.billingAddress.country_code)
                        if (country && country.states) {
                            return JSON.parse(country.states);
                        }
                        return null;
                    },
                    get shippingCountryStates() {
                        const country = this.countries.find(c => c.code === this.shippingAddress.country_code)
                        if (country && country.states) {
                            return JSON.parse(country.states);
                        }
                        return null;
                    }
                }" action="{{ route('profile.update') }}" method="post">
                    @csrf
                    <h2 class="text-xl font-semibold mb-2">Tu perfil</h2>
                    <div class="grid grid-cols-2 gap-3 mb-3">
                        <x-input
                            type="text"
                            name="first_name"
                            value="{{old('first_name', $customer->first_name)}}"
                            placeholder="Nombre"
                            class="w-full focus:border-purple-600 focus:ring-purple-600 border-gray-300 rounded"
                        />
                        <x-input
                            type="text"
                            name="last_name"
                            value="{{old('last_name', $customer->last_name)}}"
                            placeholder="Apellido"
                            class="w-full focus:border-purple-600 focus:ring-purple-600 border-gray-300 rounded"
                        />
                    </div>
                    <div class="mb-3">
                        <x-input
                            type="text"
                            name="email"
                            value="{{old('email', $user->email)}}"
                            placeholder="Email"
                            class="w-full focus:border-purple-600 focus:ring-purple-600 border-gray-300 rounded"
                        />
                    </div>
                    <div class="mb-3">
                        <x-input
                            type="text"
                            name="phone"
                            value="{{old('phone', $customer->phone)}}"
                            placeholder="Telefono"
                            class="w-full focus:border-purple-600 focus:ring-purple-600 border-gray-300 rounded"
                        />
                    </div>

                    <h2 class="text-xl mt-6 font-semibold mb-2">Dirección de facturación</h2>
                    <div class="grid grid-cols-2 gap-3 mb-3">
                        <div>
                            <x-input
                                type="text"
                                name="billing[address1]"
                                x-model="billingAddress.address1"
                                placeholder="Dirección 1"
                                class="w-full focus:border-purple-600 focus:ring-purple-600 border-gray-300 rounded"
                            />
                        </div>
                        <div>
                            <x-input
                                type="text"
                                name="billing[address2]"
                                x-model="billingAddress.address2"
                                placeholder="Dirección 2"
                                class="w-full focus:border-purple-600 focus:ring-purple-600 border-gray-300 rounded"
                            />
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mb-3">
                        <div>
                            <x-input
                                type="text"
                                name="billing[city]"
                                x-model="billingAddress.city"
                                placeholder="Ciudad"
                                class="w-full focus:border-purple-600 focus:ring-purple-600 border-gray-300 rounded"
                            />
                        </div>
                        <div>
                            <x-input
                                type="text"
                                name="billing[zipcode]"
                                x-model="billingAddress.zipcode"
                                placeholder="Codigo Postal"
                                class="w-full focus:border-purple-600 focus:ring-purple-600 border-gray-300 rounded"
                            />
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mb-3">
                        <div>
                            <x-input type="select"
                                     name="billing[country_code]"
                                     x-model="billingAddress.country_code"
                                     class="w-full focus:border-purple-600 focus:ring-purple-600 border-gray-300 rounded">
                                <option value="">País de residencia</option>
                                <template x-for="country of countries" :key="country.code">
                                    <option :selected="country.code === billingAddress.country_code"
                                            :value="country.code" x-text="country.name"></option>
                                </template>
                            </x-input>
                        </div>
                        <div>
                            <template x-if="billingCountryStates">
                                <x-input type="select"
                                         name="billing[state]"
                                         x-model="billingAddress.state"
                                         class="w-full focus:border-purple-600 focus:ring-purple-600 border-gray-300 rounded">
                                    <option value="">Estado o provincia</option>
                                    <template x-for="[code, state] of Object.entries(billingCountryStates)"
                                              :key="code">
                                        <option :selected="code === billingAddress.state"
                                                :value="code" x-text="state"></option>
                                    </template>
                                </x-input>
                            </template>
                            <template x-if="!billingCountryStates">
                                <x-input
                                    type="text"
                                    name="billing[state]"
                                    x-model="billingAddress.state"
                                    placeholder="Estado o provincia"
                                    class="w-full focus:border-purple-600 focus:ring-purple-600 border-gray-300 rounded"
                                />
                            </template>
                        </div>
                    </div>

                    <div class="flex justify-between mt-6 mb-2">
                        <h2 class="text-xl font-semibold">Dirección de envío</h2>
                        <label for="sameAsBillingAddress" class="text-gray-700">
                            <input @change="$event.target.checked ? shippingAddress = {...billingAddress} : ''"
                                   id="sameAsBillingAddress" type="checkbox"
                                   class="text-purple-600 focus:ring-purple-600 mr-2"> El mismo que la facturación
                        </label>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mb-3">
                        <div>
                            <x-input
                                type="text"
                                name="shipping[address1]"
                                x-model="shippingAddress.address1"
                                placeholder="Dirección 1"
                                class="w-full focus:border-purple-600 focus:ring-purple-600 border-gray-300 rounded"
                            />
                        </div>
                        <div>
                            <x-input
                                type="text"
                                name="shipping[address2]"
                                x-model="shippingAddress.address2"
                                placeholder="dirección 2"
                                class="w-full focus:border-purple-600 focus:ring-purple-600 border-gray-300 rounded"
                            />
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mb-3">
                        <div>
                            <x-input
                                type="text"
                                name="shipping[city]"
                                x-model="shippingAddress.city"
                                placeholder="Ciudad"
                                class="w-full focus:border-purple-600 focus:ring-purple-600 border-gray-300 rounded"
                            />
                        </div>
                        <div>
                            <x-input
                                name="shipping[zipcode]"
                                x-model="shippingAddress.zipcode"
                                type="text"
                                placeholder="Codigo Postal"
                                class="w-full focus:border-purple-600 focus:ring-purple-600 border-gray-300 rounded"
                            />
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mb-3">
                        <div>
                            <x-input type="select"
                                     name="shipping[country_code]"
                                     x-model="shippingAddress.country_code"
                                     class="w-full focus:border-purple-600 focus:ring-purple-600 border-gray-300 rounded">
                                <option value="">País de residencia</option>
                                <template x-for="country of countries" :key="country.code">
                                    @foreach ($countries as $country)
                                        <option :selected="country.code === shippingAddress.country_code"
                                            :value="country.code" x-text="country.name"></option>
                                    @endforeach
                                    
                                </template>
                            </x-input>
                        </div>
                        <div>
                            <template x-if="shippingCountryStates">
                                <x-input type="select"
                                         name="shipping[state]"
                                         x-model="shippingAddress.state"
                                         class="w-full focus:border-purple-600 focus:ring-purple-600 border-gray-300 rounded">
                                    <option value="">Estado o provincia</option>
                                    <template x-for="[code, state] of Object.entries(shippingCountryStates)"
                                              :key="code">
                                        <option :selected="code === shippingAddress.state"
                                                :value="code" x-text="state"></option>
                                    </template>
                                </x-input>
                            </template>
                            <template x-if="!shippingCountryStates">
                                <x-input
                                    type="text"
                                    name="shipping[state]"
                                    x-model="shippingAddress.state"
                                    placeholder="Estado o provincia"
                                    class="w-full focus:border-purple-600 focus:ring-purple-600 border-gray-300 rounded"
                                />
                            </template>
                        </div>
                    </div>

                    <x-button class="w-full"><i class="fa-solid fa-arrows-rotate"></i>  Actualizar datos</x-button>
                </form>
            </div>
            <div class="bg-white p-3 shadow rounded-lg">
                <form action="{{route('profile_password.update')}}" method="post">
                    @csrf
                    <h2 class="text-xl font-semibold mb-2">Cambiar contraseña</h2>
                    <div class="mb-3">
                        <x-input
                            type="password"
                            name="old_password"
                            placeholder="Tu actual contraseña"
                            class="w-full focus:border-purple-600 focus:ring-purple-600 border-gray-300 rounded"
                        />
                    </div>
                    <div class="mb-3">
                        <x-input
                            type="password"
                            name="new_password"
                            placeholder="Nueva contraseña"
                            class="w-full focus:border-purple-600 focus:ring-purple-600 border-gray-300 rounded"
                        />
                    </div>
                    <div class="mb-3">
                        <x-input
                            type="password"
                            name="new_password_confirmation"
                            placeholder="Repita la nueva contraseña"
                            class="w-full focus:border-purple-600 focus:ring-purple-600 border-gray-300 rounded"
                        />
                    </div>
                    <x-button><i class="fa-solid fa-arrows-rotate"></i>  Cambiar</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>