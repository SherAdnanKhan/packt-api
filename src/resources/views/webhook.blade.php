<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Webhook') }}
        </h2>
    </x-slot>

    <div class="py-12 mx-auto sm:max-w-7xl px-6">
        <div class="flex flex-wrap -mx-3 overflow-hidden py-6 ">

            <div class="my-1 w-full px-3 pb-12 overflow-hidden">
                <div class="shadow-xl sm:rounded-lg bg-white h-full sm:pt-6 p-3">
                    <p>
                        Setup a callback (webhook) to your systems, see <a href="#" target="_blank">documentation</a> on the format and usage.
                    </p>

                    <!-- component -->
                    <div class="flex">

                        <form id="form" class="px-8 pt-6 pb-8 mb-4" x-data="webhookForm()" x-init="getWebhookURL()" method="POST">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                    URL
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="url" id="url-field" type="url" placeholder="URL" required x-model="formData.url">
                            </div>

                            <div class="mb-4">

                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                    <input
                                        class="shadow border py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        name="canary" id="url-field" type="checkbox" x-model="formData.canary">
                                    Enable schedule canary callbacks (sent once every 8 hours)
                                </label>

                            </div>

                            <div class="flex items-center">
                                <button id="test-btn"
                                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 mr-2 rounded focus:outline-none focus:shadow-outline"
                                        type="button"
                                        @click.prevent="submitTestURL">Test
                                </button>
                                <button id="submit"
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                        type="button"
                                        :disabled="testStatus === false"
                                        @click.prevent="saveWebhookURL"
                                        x-text="saveBtntext"></button>
                            </div>


                            <p class="flex items-center font-medium tracking-wide  text-s mt-5 ml-1"
                               :class="{ 'text-green-500': status === 'success', 'text-red-500': status === 'error' }"
                               x-text="message"
                            ></p>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        function webhookForm() {
            return {
                formData: {
                    url: '',
                    canary: false,
                    _token: "{{ csrf_token() }}",
                },
                message: '',
                status: '',
                testStatus: false,
                saveBtntext: 'Save',
                getWebhookURL()
                {
                    fetch('/get-webhook-url', {
                        method: 'GET',
                        headers: {'Content-Type': 'application/json'}
                    })
                        .then(res => res.json())
                        .then((data) => {
                            if(data.success === true) {
                                this.formData.url = data.data.url;
                                this.formData.canary = data.data.canary;
                                this.saveBtntext = 'Update';
                            }
                        })
                        .catch((e) => {
                        })
                },
                submitTestURL()
                {
                    fetch('/test-webhook-url', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify(this.formData)
                    })
                        .then(res => res.json())
                        .then((data) => {
                            if(data.success === false && data.hasOwnProperty('errors')) {
                                this.message = 'Validation error';
                                this.status = 'error';
                                for (const [key, value] of Object.entries(data.errors)) {
                                    this.message += ': ' + value;
                                }
                            } else if(data.success === false) {
                                this.message = 'Oops! Something went wrong.';
                                this.status = 'error';
                            } else {
                                this.message = 'Webhook call made successfully.';
                                this.status = 'success';
                                this.testStatus = true;
                            }
                        })
                        .catch((e) => {
                            this.message = e
                            this.status = 'error';
                        })
                },
                saveWebhookURL()
                {
                    fetch('/save-webhook-url', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify(this.formData)
                    })
                        .then(res => res.json())
                        .then((data) => {
                            if(data.success === false && data.hasOwnProperty('errors')) {
                                this.message = 'Validation error';
                                this.status = 'error';
                                for (const [key, value] of Object.entries(data.errors)) {
                                    this.message += ': ' + value;
                                }
                            } else if(data.success === false) {
                                this.message = 'Oops! Something went wrong.';
                                this.status = 'error';
                            } else {
                                this.message = 'Webhook URL saved successfully.';
                                this.status = 'success';
                                this.testStatus = true;
                                this.resetForm();
                                this.getWebhookURL();
                            }
                        })
                        .catch((e) => {
                            this.message = e
                            this.status = 'error';
                        })
                },
                resetForm()
                {
                    this.formData.url = '';
                    this.formData.canary = false;
                }
            }
        }

    </script>

    <style>
        button:disabled {
            cursor: not-allowed;
            opacity: 0.5;
        }
    </style>

</x-app-layout>
