<link href="{{ asset('css/docs.css') }}" rel="stylesheet">
<div class="page-body">
    <div id="api-menu" class="api-menu">
        <a href="" class="a--plain api-logo" title="Packt+ homepage"><img src="/material/img/logo.png" srcset="/material/img/logo.png 2x, /material/img/logo.png 1x" class="api-logo__img" alt="Pwinty"></a>
        <h1 class="u-hidden">Navigation</h1>
        <h2 class="api-menu__title"><a href="" class="a--plain" title="Overview">Overview</a></h2>
        <ul>
            <li><a href="/doc-overview/#environments" class="api-menu__link a--plain" title="API environments">Environments</a></li>
            <li><a href="/doc-overview/#format" class="api-menu__link a--plain" title="API formats">Format</a></li>
            <li><a href="/doc-overview/#errors" class="api-menu__link a--plain" title="API error handling">Error handling</a></li>
            <li><a href="/doc-overview/#authentication" class="api-menu__link a--plain" title="API authentication">Authentication</a></li>
            <li><a href="/doc-overview/#callbacks" class="api-menu__link a--plain" title="API callbacks">Callbacks</a></li>
        </ul>
        <h2 class="api-menu__title"><a href="/doc-overview/#your-first-order" class="a--plain" title="Your first API order">Packt Product API</a></h2>
        <ol>
            <li><a href="/doc-overview/#create" class="api-menu__link a--plain" title="Create an API order">GET API</a></li>
            <li><a href="/doc-overview/#add-image" class="api-menu__link a--plain" title="Add an image to your order">PUT API</a></li>
            <li><a href="/doc-overview/#validate" class="api-menu__link a--plain" title="Validate your order">POST API</a></li>
            <li><a href="/doc-overview/#submit" class="api-menu__link a--plain" title="Submit your API order">DELETE</a></li>
        </ol>
        <h2 class="api-menu__title"><a href="/doc-overview/#faqs" class="a--plain" title="API FAQs">FAQs</a></h2>
        <h2 class="api-menu__title"><a href="/doc-overview/#orders" class="a--plain" title="API ref: Orders">Reference</a></h2>
        <h3 class="api-menu__subtitle"><a href="/doc-overview/#orders" class="a--plain" title="API ref: Orders">Products</a></h3>
        <ol>
            <li><a href="/doc-overview/#orders-get" class="api-menu__link a--plain" title="Get order by ID">Get</a></li>
            <li><a href="/doc-overview/#orders-list" class="api-menu__link a--plain" title="List orders">List</a></li>
            <li><a href="/doc-overview/#orders-create" class="api-menu__link a--plain" title="Create order">Create</a></li>
            <li><a href="/doc-overview/#orders-update" class="api-menu__link a--plain" title="Update order">Update</a></li>
            <li><a href="/doc-overview/#orders-validate" class="api-menu__link a--plain" title="Validate order">Validate</a></li>
            <li><a href="/doc-overview/#orders-update-status" class="api-menu__link a--plain" title="Submit order">Submit</a></li>
            <li><a href="/doc-overview/#orders-cancel" class="api-menu__link a--plain" title="Cancel order">Cancel</a></li>
        </ol>
        <h3 class="api-menu__subtitle"><a href="/doc-overview/#images" class="a--plain" title="API ref: Images">Images</a></h3>
        <ol>
            <li><a href="/doc-overview/#images-object" class="api-menu__link a--plain" title="Image object">Image object</a></li>
            <li><a href="/doc-overview/#images-add" class="api-menu__link a--plain" title="Add image">Add image</a></li>
            <li><a href="/doc-overview/#images-add-batch" class="api-menu__link a--plain" title="Add multiple images">Add multiple images</a></li>
            <li><a href="/doc-overview/#image-resizing" class="api-menu__link a--plain" title="Image resizing">Resizing</a></li>
        </ol>
        <h3 class="api-menu__subtitle"><a href="/doc-overview/#shipments" class="a--plain" title="API ref: Shipments">Content API</a></h3>
        <ol>
            <li><a href="/doc-overview/#shipment-object" class="api-menu__link a--plain" title="API shipment object">The Content object</a></li>
        </ol>
        <h3 class="api-menu__subtitle"><a href="/doc-overview/#countries" class="a--plain" title="API ref: Countries">Countries</a></h3>
        <ol>
            <li><a href="/doc-overview/#countries-list" class="api-menu__link a--plain" title="Country list">List</a></li>
        </ol>
        <h3 class="api-menu__subtitle"><a href="/doc-overview/#catalogue" class="a--plain" title="API ref: Catalogue">Catalogue</a></h3>
        <ol>
            <li><a href="/doc-overview/#catalogue-prices" class="api-menu__link a--plain" title="Fetch prices for SKU's">Fetch prices</a></li>
        </ol>
    </div>
    <button id="api-menu-toggle" class="button button--small api-menu-toggle">Menu <span class="api-menu-toggle__icon">▲</span></button>
    <section class="api-section">
        <h1 class="api-page-title">Packt+ API documentation</h1>
        <div class="api-block api-block--intro">
            <p>This is the documentation for the current version of our API, <mark>v3.0</mark>.</p>
            <p>All new clients should integrate with this version. Documentation for <a href="/doc-overview/#previous-versions" title="Current Pwinty API documentation">previous versions</a> is also available for existing clients.</p>
            <p><strong>Need an account?</strong> <a href="/register" title="Get a Packt+ account">Sign up now</a>.</p>
        </div>
    </section>
    <section class="api-section" id="overview">
        <h2 class="u-hidden">Overview</h2>
        <div class="api-block">
            <h2 class="api-section-title u-hidden">Overview</h2>
            <h3 id="environments" class="api-block__title">Environments</h3>
            <p>There are two environments available: production and sandbox. Testing and development should be done against the sandbox API. This is an environment where you can create, and submit orders without incurring any costs. All orders submitted to the production environment will be processed and charged.</p>
            <p>Requests should always be made over HTTPS. Connections cannot be made via HTTP. Please note that support for SSL 3.0 has been disabled and we recommend using TLS 1.2 or better.</p>
            <h4 class="api-block__subtitle">Production</h4>
            <p>API Endpoint:<code>https://api.packt.com/v3.0</code></p>
            <p>Dashboard: <code><a href="" title="Packt+ Dashboard">https://dashboard.packt.com</a></code></p>
            <h4 class="api-block__subtitle">Sandbox (testing)</h4>
            <p>API Endpoint:<code>https://sandbox.packt.com/v3.0</code></p>
            <p>Dashboard: <code><a href="" title="Packt+ Sandbox Dashboard">https://sandbox-beta-dashboard.packt.com/</a></code></p>
        </div>
        <div id="format" class="api-block">
            <h3 class="api-block__title">Format</h3>
            <h4 class="api-block__subtitle">Request format</h4>
            <p>Requests should be made using either JSON or HTTP form data.</p>
            <p>The <code>Content-type</code> header should be set accordingly to either <code>Content-type: application/json</code> or <code>application/x-www-form-urlencoded</code>.</p>
            <h4 class="api-block__subtitle">Response format</h4>
            <p>Please note that responses are formatted according to the <code>accept</code> http header. At present, we recommend that you supply an value of <code>accept: application/json</code> at this time. We can and do provide responses in XML but the schema isn't presently stable.</p>
        </div>
        <div id="errors" class="api-block">
            <h3 class="api-block__title">Error handling</h3>
            <p>Errors are returned using <a href="http://en.wikipedia.org/wiki/List_of_HTTP_status_codes" title="HTTP error codes" target="_blank">standard HTTP status codes.</a> Packt+ will return an empty version of the expected item, with an errorMessage parameter (this makes deserialization easier in some languages).</p>
            <h4 class="api-block__subtitle">Standard API errors</h4>
            <table class="table">
                <thead>
                <tr>
                    <th class="api-field">Code</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="api-field"><code>400</code></td>
                    <td>Bad or missing input parameter- see error for more details.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>403</code></td>
                    <td>Forbidden. The request is not valid for the resource in its current state.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>404</code></td>
                    <td>Resource not found.</td>
                </tr>
                </tbody>
            </table>
            <h4 class="api-block__subtitle">Error code format</h4>
            <p>All errors should return a standard JSON object in the response, containing an error message.</p>
            <pre>{
    "errorMessage": "This is a sample error message"
}</pre>
        </div>
        <div id="authentication" class="api-block">
            <h3 class="api-block__title">Authentication</h3>
            <p>Packt+ uses custom HTTP headers for authentication, with the MerchantID and API key you received when signing up.</p>
            <table class="table">
                <thead>
                <tr>
                    <th class="api-field">Header</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="api-field"><code>X-Packt+-MerchantId</code></td>
                    <td>Your MerchantID.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>X-Packt+-REST-API-Key</code></td>
                    <td>Your API key.</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div id="callbacks" class="api-block">
            <h2 class="api-block__title">Callbacks</h2>
            <p>Packt+ can make callbacks to a custom URL whenever the status of one of your orders changes.</p>
            <p>Setup your callback URL under the <a href="https://dashboard.prodigi.com/settings/integrations" title="Your Packt+ dashboard">Integrations</a> section of the Dashboard.</p>
            <p>Packt+ will make an JSON formatted HTTP <strong>POST</strong> to your chosen URL with the following parameters.</p>
            <h3 class="api-block__subtitle">Returned values</h3>
            <table class="table table--striped table--full">
                <thead>
                <tr>
                    <th class="api-field">Parameter</th>
                    <th>Description</th>
                    <th class="u-nowrap">Data type</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="api-field"><code>orderId</code></td>
                    <td>The Packt+ ID of the order.</td>
                    <td>integer</td>
                </tr>
                <tr>
                    <td class="api-field"><code>environment</code></td>
                    <td>The environment from which the callback originated, either <code>LIVE</code> or <code>SANDBOX</code>.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>timestamp</code></td>
                    <td>The time the change took place.</td>
                    <td>datetime</td>
                </tr>
                <tr>
                    <td class="api-field"><code>status</code></td>
                    <td>The current status of the order. One of <code>NotYetSubmitted</code>, <code>Submitted</code>, <code>Complete</code>, or <code>Cancelled</code>.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>shipments</code></td>
                    <td>
                        Each shipment in the order. Note that this can be empty if the shipments have not yet been allocated, and it may change. You will receive a callback each time a new shipment is created, or a shipment status changes. <button type="button" class="button button--inverse toggle-next toggle-next--fixedwidth"><span class="inactive">Show</span><span class="active">Hide</span></button>
                        <table class="table u-hidden">
                            <thead>
                            <tr>
                                <th>Field</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="api-field"><code>items</code></td>
                                <td>An array of item IDs included in the shipment.</td>
                                <td>array</td>
                            </tr>
                            <tr>
                                <td class="api-field"><code>status</code></td>
                                <td>Either <code>InProgress</code> or <code>Shipped</code>.</td>
                                <td>string</td>
                            </tr>
                            <tr>
                                <td class="api-field"><code>trackingNumber</code></td>
                                <td>Tracking number for the shipment where available.</td>
                                <td>string</td>
                            </tr>
                            <tr>
                                <td class="api-field"><code>trackingUrl</code></td>
                                <td>Tracking URL for the shipment where available.</td>
                                <td>string</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>array</td>
                </tr>
                </tbody>
            </table>
            <h3 class="api-block__subtitle">Retries</h3>
            <p>Packt+ will continue to try and make the callback until it receives an OK (200) Status code response from your server, or until the callback has failed 15 times. The time between each callback retry attempt will increase each time there is a failure.</p>
        </div>
    </section>
    <!--<section class="api-section" id="your-first-order">
        <div class="api-section__intro">
            <h2 class="api-section__title">Your first order</h2>
            <p>It's really easy to get up and running with Packt+. Follow our step by step guide below.</p>
        </div>
        <div id="create" class="api-block">
            <h3 class="api-block__title">1. Create an order</h3>
            <p> Make a <strong>POST</strong> call to <code>/v3.0/orders</code>. Get back the order ID, which you will need for adding images to the order. If you don't have the address don't worry — create the order without the address parameters, and update it later in the process. </p>
            <button type="button" class="button button--inverse toggle-next"><span class="inactive">Show curl example</span><span class="active">Hide curl example</span></button>
            <pre class="u-hidden">curl https://sandbox.pwinty.com/v3.0/orders \
    -H "X-Packt+-MerchantId: YourMerchantId" \
    -H "X-Packt+-REST-API-Key: YourAPIKey" \
    -H "Content-Type: application/x-www-form-urlencoded" \
    -d countryCode=GB \
    -d recipientName=Mr%20Jones \
    -d address1=The%20Hollies \
    -d addressTownOrCity=Cardiff \
    -d stateOrCounty=Glamorgan \
    -d postalOrZipCode=CF11%201AX \
    -d preferredShippingMethod=Express</pre>
        </div>
        <div id="add-image" class="api-block">
            <h3 class="api-block__title">2. Add an image to the order</h3>
            <p>Make <strong>POST</strong> calls to <code>/v3.0/orders/{orderId}/images</code>.</p>
            <button type="button" class="button button--inverse toggle-next"><span class="inactive">Show curl example</span><span class="active">Hide curl example</span></button>
            <pre class="u-hidden">curl https://sandbox.pwinty.com/v3.0/orders/1065/images \
    -H "X-Pwinty-MerchantId: YourMerchantId" \
    -H "X-Pwinty-REST-API-Key: YourAPIKey" \
    -H "Content-Type: application/x-www-form-urlencoded" \
    -d sku=ART-PRI-HPG-20X28-PRODIGI_GB \
    -d url=http%3A%2F%2Fwww.testserver.com%2Faphoto.jpg \
    -d md5Hash="79054025255fb1a26e4bc422aef54eb4" \
    -d copies=2 \
    -d sizing=Crop</pre>
        </div>
        <div id="validate" class="api-block">
            <h3 class="api-block__title">3. Check the order is valid</h3>
            <p>Make a <strong>GET</strong> call to <code>/v3.0/orders/<wbr>{orderId}/SubmissionStatus</code> to check the order is valid and ready to be submitted.</p>
            <button type="button" class="button button--inverse toggle-next"><span class="inactive">Show curl example</span><span class="active">Hide curl example</span></button>
            <pre class="u-hidden">curl https://sandbox.pwinty.com/v3.0/orders/1065/SubmissionStatus \
    -H "X-Packt+-MerchantId: YourMerchantId" \
    -H "X-Packt+-REST-API-Key: YourAPIKey"</pre>
        </div>
        <div id="submit" class="api-block">
            <h3 class="api-block__title">4. Submit the order</h3>
            <p>Make a <strong>POST</strong> call to <code>/v3.0/orders/{orderId}/status</code> to set the Status to "Submitted".</p>
            <button type="button" class="button button--inverse toggle-next"><span class="inactive">Show curl example</span><span class="active">Hide curl example</span></button>
            <pre class="u-hidden">curl https://sandbox.pwinty.com/v3.0/orders/6961/status \
    -H "X-Packt+-MerchantId: YourMerchantId" \
    -H "X-Packt+-REST-API-Key: YourAPIKey" \
    -H "Content-Type: application/x-www-form-urlencoded" \
    -d status=Submitted</pre>
        </div>
    </section>-->
    <section class="api-section" id="faqs">
        <div class="api-section__intro">
            <h2 class="api-section__title">Frequently asked questions</h2>
        </div>
        <div class="api-block">
            <h3 class="api-block__title">Can I remove an image from an open order?</h3>
            <p>Once an order has been created, the images cannot be removed. If there is a problem with the images on an order, we recommend creating a new order and cancelling the original if it has already been submitted.</p>
            <br>
            <h3 class="api-block__title">Do you support shipping notes?</h3>
            <p>Yes we support shipping notes via the API. Although product and production facility coverage of this feature is continuing to expand, it may not be available for all orders. If you would like to confirm the availability of shipping notes for your typical orders, please <a href="/contact" title="Contact us">get in touch</a>.</p>
            <br>
            <h3 class="api-block__title">Why are my orders printed in a different country than their destination?</h3>
            <p>When deciding where to print your orders, we take many elements into account including the cost, shipping speed and availability of the products. We will always look to print your orders at the cheapest available cost, ensuring we stay within the expected shipping times, passing those savings on to you.</p>
        </div>
    </section>
    <!--<section class="api-section" id="orders">
        <div class="api-section__intro">
            <h2 class="api-section__title">Orders</h2>
        </div>
        <div id="orders-get" class="api-block">
            <h2 class="api-block__title">Get an order</h2>
            <p>Retrieves information about a single order.</p>
            <h3 class="api-block__subtitle">URL</h3>
            <p><strong>GET</strong> <code>/v3.0/orders/{id}</code></p>
            <h3 class="api-block__subtitle">Sample response</h3>
            <pre>{
    "data": {
       "id": 1065,
       "address1": "14 Acacia Avenue",
       "address2": "",
       "postalOrZipCode": "CF11 1AB",
       "countryCode": "GB",
       "addressTownOrCity": "Cardiff",
       "recipientName": "Tom Smith",
       "stateOrCounty": "Glamorgan",
       "status": Complete
       "payment": "InvoiceMe",
       "paymentUrl": null,
       "price": 0,
          "shippingInfo": {
           "price": 299,
           "shipments": [
               {
                   "carrier": "RoyalMail",
                   "photoIds": [
                       520151
                   ],
                   "shipmentId": "506332",
                   "trackingNumber": "XYZ123456ABC",
                   "trackingUrl": "http://www.royalmail.com/portal/rm/track?trackNumber=XYZ123456ABC",
                   "isTracked": false,
                   "earliestEstimatedArrivalDate": "2018-08-16T00:00:00",
                   "latestEstimatedArrivalDate": "2018-08-18T23:59:59",
                   "shippedOn": "2018-08-15T15:34:59"
               }
           ]
       },
       "images": [
           {
               "id": 520151,
               "sku": "RT-PRI-HPG-20X28",
               "url": "url": "https://prodigi-uploads/mp1ht9.jpg"
               "status": "Ok",
               "copies": 1,
               "sizing": Crop
               "priceToUser": 200,
               "price": 40,
               "md5Hash": "70e8b246527f88131a5ea00ac3eced84"
               "previewUrl": "https://pwintyimages/1b90a95&amp;sp=rw",
               "thumbnailUrl": "https://pwintyimages/47845&amp;sp=rw",
               "attributes": {
                   "substrateWeight": "400gsm",
                   "frame": "gbp",
                   "edge": "19mm",
                   "paperType": "hmc",
                   "frameColour": "gold"
               },
               "errorMessage": null
           }
       ],
       "merchantOrderId": "ORD-123-456",
       "preferredShippingMethod": "Standard",
       "mobileTelephone": null,
       "created": "2018-08-14T08:54:35.213",
       "lastUpdated": "2018-08-14T09:38:28.57",
       "canCancel": true,
       "canHold": true,
       "canUpdateShipping": true,
       "canUpdateImages": false,
       "errorMessage": null,
       "invoiceAmountNet": 0,
       "invoiceTax": 0,
       "invoiceCurrency": null
   },
   "statusTxt": "OK",
   "statusCode": 200
}</pre>
            <h3 class="api-block__subtitle">Returned values</h3>
            <table class="table table--striped table--full">
                <thead>
                <tr>
                    <th class="api-field">Field</th>
                    <th>Description</th>
                    <th>Type</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="api-field"><code>id</code></td>
                    <td>The ID of the order.</td>
                    <td>integer</td>
                </tr>
                <tr>
                    <td class="api-field"><code>canCancel</code></td>
                    <td>Whether the order can be cancelled (depends on fulfilment partner and status of the order).</td>
                    <td>boolean</td>
                </tr>
                <tr>
                    <td class="api-field"><code>canHold</code></td>
                    <td>Whether the order can be placed on hold (depends on fulfilment partner and status of the order).</td>
                    <td>boolean</td>
                </tr>
                <tr>
                    <td class="api-field"><code>canUpdateShipping</code></td>
                    <td>Whether the order shipping address/method can be udpated (depends on fulfilment partner and status of the order).</td>
                    <td>boolean</td>
                </tr>
                <tr>
                    <td class="api-field"><code>canUpdateImages</code></td>
                    <td>Whether the images in the order are updateable (depends on fulfilment partner and status of the order).</td>
                    <td>boolean</td>
                </tr>
                <tr>
                    <td class="api-field"><code>recipientName</code></td>
                    <td>To whom the order will be addressed.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>address1</code></td>
                    <td>First line of recipient address.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>address2</code></td>
                    <td>Second line of recipient address.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>addressTownOrCity</code></td>
                    <td>Town/city of recipient address.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>stateOrCounty</code></td>
                    <td>State (US), county (UK) or region of recipient address.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>postalOrZipCode</code></td>
                    <td>Postal/Zipcode of recipient address.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>countryCode</code></td>
                    <td>Two-letter country code of the recipient.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>mobileTelephone</code></td>
                    <td>Recipient's phone number.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>price</code></td>
                    <td>How much Packt+ will charge you for this order.</td>
                    <td>integer</td>
                </tr>
                <tr>
                    <td class="api-field"><code>status</code></td>
                    <td>Status of order. Can be <code>NotYetSubmitted</code>, <code>Submitted</code>,<code>AwaitingPayment</code>, <code>Complete</code>, or <code>Cancelled</code>.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>shippingInfo</code></td>
                    <td>
                        Shipping object showing how the order will be shipped. <button type="button" class="button button--inverse toggle-next toggle-next--fixedwidth"><span class="inactive">Show</span><span class="active">Hide</span></button>
                        <div class="u-hidden">
                            <p> Orders of multiple product types may be automatically split into separate sub-orders and processed individually.<br> When this is the case we will provide details of all the shipments within a <code>shippingInfo</code> object as an array of <code>shipping</code> objects.<br> </p>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ShippingField</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="api-field"><code>price</code></td>
                                    <td>The cost of the entire shipment.</td>
                                    <td>integer</td>
                                </tr>
                                <tr>
                                    <td class="api-field"><code>shipments</code></td>
                                    <td>An array of <a href="/doc-overview/#shipment-object" title="The shipment object">shipment objects</a>.</td>
                                    <td>array</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                    <td>object</td>
                </tr>
                <tr>
                    <td class="api-field"><code>payment</code></td>
                    <td>Payment option for order, can be either <code>InvoiceMe</code> or <code>InvoiceRecipient</code>.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>paymentUrl</code></td>
                    <td>If payment is set to <code>InvoiceRecipient</code> then the URL the customer should be sent to to complete payment.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>images</code></td>
                    <td>An array of objects representing the <a href="/doc-overview/#images-object" title="Image object">images</a> in the order.</td>
                    <td>array</td>
                </tr>
                <tr>
                    <td class="api-field"><code>merchantOrderId</code></td>
                    <td>Your order reference.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>preferredShippingMethod</code></td>
                    <td>Shipping method selected when creating an order. Can be <code>Budget</code>, <code>Standard</code>, <code>Express</code>, or <code>Overnight</code>. </td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>created</code></td>
                    <td>The time the order was created.</td>
                    <td>datetime</td>
                </tr>
                <tr>
                    <td class="api-field"><code>lastUpdated</code></td>
                    <td>The time the order was updated for the last time.</td>
                    <td>datetime</td>
                </tr>
                <tr>
                    <td class="api-field"><code>errorMessage</code></td>
                    <td>Detail about any error on the request.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>invoiceAmountNet</code></td>
                    <td>Used for orders where an invoice amount must be supplied (e.g. to Middle East).</td>
                    <td>integer</td>
                </tr>
                <tr>
                    <td class="api-field"><code>invoiceTax</code></td>
                    <td>Used for orders where an invoice amount must be supplied (e.g. to Middle East).</td>
                    <td>integer</td>
                </tr>
                <tr>
                    <td class="api-field"><code>invoiceCurrency</code></td>
                    <td>Used for orders where an invoice amount must be supplied (e.g. to Middle East).</td>
                    <td>string</td>
                </tr>
                </tbody>
            </table>
            <h3 class="api-block__subtitle">Errors</h3>
            <ul>
                <li><code>404</code> The order with the specified id was not found.</li>
            </ul>
        </div>
        <div id="orders-list" class="api-block">
            <h2 class="api-block__title">List orders</h2>
            <p>Retrieves multiple orders, most recent first.</p>
            <p>Note that calls that return potentially more than one result may omit shipping information from the results if the order hasn't yet been processed.</p>
            <h3 class="api-block__subtitle">URL</h3>
            <p><strong>GET</strong> <code>/v3.0/orders?limit=100&amp;start=0</code></p>
            <h3 class="api-block__subtitle">Parameters</h3>
            <table class="table table--striped">
                <tbody>
                <tr>
                    <td class="api-field"><code>limit</code> <em class="api-field__property">optional</em></td>
                    <td>Number of orders to return. Default 100, max 250.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>start</code> <em class="api-field__property">optional</em></td>
                    <td>Start position used for paginating order list. Default 0.</td>
                </tr>
                </tbody>
            </table>
            <h3 class="api-block__subtitle">Returned values</h3>
            <p>Order objects. See <a href="/doc-overview/#orders-get">Orders (GET)</a> for example response.</p>
            <h3 class="api-block__subtitle">Errors</h3>
            <ul>
                <li><code>404</code> The order with the specified id was not found.</li>
            </ul>
        </div>
        <div id="orders-create" class="api-block">
            <h2 class="api-block__title">Create an order</h2>
            <h3 class="api-block__subtitle">URL</h3>
            <p><strong>POST</strong> <code>/v3.0/orders</code></p>
            <h3 class="api-block__subtitle">Parameters</h3>
            <table class="table table--striped">
                <tbody>
                <tr>
                    <td class="api-field"><code>merchantOrderId</code> <em class="api-field__property">optional</em></td>
                    <td>Your identifier for this order.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>recipientName</code></td>
                    <td>Recipient name.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>address1</code> <em class="api-field__property">optional</em> *</td>
                    <td>First line of recipient address.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>address2</code> <em class="api-field__property">optional</em></td>
                    <td>Second line of recipient address.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>addressTownOrCity</code> <em class="api-field__property">optional</em> *</td>
                    <td>Town or city of the recipient.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>stateOrCounty</code> <em class="api-field__property">optional</em></td>
                    <td>State, county or region of the recipient.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>postalOrZipCode</code> <em class="api-field__property">optional</em> *</td>
                    <td>Postal or zip code of the recipient.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>countryCode</code></td>
                    <td>Two-letter country code of the recipient.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>preferredShippingMethod</code></td>
                    <td> Possible values are <code>Budget</code>, <code>Standard</code>, <code>Express</code>, and <code>Overnight</code>. </td>
                </tr>
                <tr>
                    <td class="api-field"><code>payment</code> <em class="api-field__property">optional</em></td>
                    <td>Payment option for order, either <code>InvoiceMe</code> or <code>InvoiceRecipient</code>. Default <code>InvoiceMe</code></td>
                </tr>
                <tr>
                    <td class="api-field"><code>packingSlipUrl</code> <em class="api-field__property">optional</em> †</td>
                    <td>URL to a packing slip file. PNG format, A4 size recommended.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>mobileTelephone <em class="api-field__property">optional</em></code></td>
                    <td>Customer's mobile number for shipping updates and courier contact.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>telephone</code> <em class="api-field__property">optional</em></td>
                    <td>Customer's non-mobile phone number for shipping updates and courier contact.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>email</code> <em class="api-field__property">optional</em></td>
                    <td>Customer's email address.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>invoiceAmountNet <em class="api-field__property">optional</em></code></td>
                    <td>Used for orders where an invoice amount must be supplied (e.g. to Middle East).</td>
                </tr>
                <tr>
                    <td class="api-field"><code>invoiceTax <em class="api-field__property">optional</em></code></td>
                    <td>Used for orders where an invoice amount must be supplied (e.g. to Middle East).</td>
                </tr>
                <tr>
                    <td class="api-field"><code>invoiceCurrency <em class="api-field__property">optional</em></code></td>
                    <td>Used for orders where an invoice amount must be supplied (e.g. to Middle East).</td>
                </tr>
                </tbody>
            </table>
            <p class="table-footnote">* Although these are optional for order creation, they are required when <a href="/doc-overview/#orders-update-status" title="Submit your order">submitting</a> your order.</p>
            <p class="table-footnote">† Not all production facilities support shipping notes. Please <a href="/contact" title="Contact us">contact us</a> to confirm availability for your typical product range.</p>
            <h3 class="api-block__subtitle">Returned values</h3>
            <p>A JSON <a href="/doc-overview/#orders-get" title="The order object">order object</a> representing the new order.</p>
            <h3 class="api-block__subtitle">Errors</h3>
            <ul>
                <li><code>400</code> One of the input parameters was invalid or missing. The error message will indicate which one and why.</li>
            </ul>
        </div>
        <div id="orders-update" class="api-block">
            <h2 class="api-block__title">Update an order</h2>
            <h3 class="api-block__subtitle">URL</h3>
            <p><strong>PUT</strong> <code>/v3.0/orders/{id}</code></p>
            <h3 class="api-block__subtitle">Parameters</h3>
            <p>A JSON <a href="/doc-overview/#orders-create" title="Create order - parameters">object</a> identical to the one used when creating an order.</p>
            <h3 class="api-block__subtitle">Returned values</h3>
            <p>A JSON <a href="/doc-overview/#orders-get" title="The order object">object</a> representing the updated order.</p>
            <h3 class="api-block__subtitle">Errors</h3>
            <ul>
                <li><code>400</code> One of the input parameters was invalid or missing, error message should indicate which one and why.</li>
                <li><code>403</code> Only orders in state <code>NotYetSubmitted</code> can be updated.</li>
                <li><code>404</code> No order with that id was found.</li>
            </ul>
        </div>
        <div id="orders-validate" class="api-block">
            <h2 class="api-block__title">Validate an order</h2>
            <p>Before submitting an order, you can validate it to make sure it's good to go, or we can tell you why it isn't.</p>
            <h3 class="api-block__subtitle">URL</h3>
            <p><strong>GET</strong> <code>/v3.0/orders/{id}/SubmissionStatus</code></p>
            <h3 class="api-block__subtitle">Parameters</h3>
            <table class="table">
                <tbody>
                <tr>
                    <td class="api-field"><code>id</code></td>
                    <td>Order ID</td>
                </tr>
                </tbody>
            </table>
            <h3 class="api-block__subtitle">Sample response</h3>
            <pre>{
    "id": 1065,
    "isValid": false,
    "generalErrors" : [
        "PostalAddressNotSet",
        "ItemsContainingErrors"
    ]
    "photos" : [
        {
           "id" : 5431,
           "errors" : [
            "FileCouldNotBeDownloaded"
           ],
           "warnings" : []
        },
        {
           "id" : 5449
           "errors" : [],
           "warnings" : [
            "PictureSizeTooSmall",
            "CroppingWillOccur"
           ]
        }
    ]
}</pre>
            <h3 class="api-block__subtitle">Returned values</h3>
            <table class="table table--striped table--full">
                <thead>
                <tr>
                    <th class="api-field">Field</th>
                    <th>Description</th>
                    <th>Type</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="api-field"><code>id</code></td>
                    <td>ID of the order</td>
                    <td>integer</td>
                </tr>
                <tr>
                    <td class="api-field"><code>isValid</code></td>
                    <td>Whether the order is valid. Submission will it succeed if you submit it.</td>
                    <td>boolean</td>
                </tr>
                <tr>
                    <td class="api-field"><code>photos</code></td>
                    <td>
                        Invalid images in the order. <button type="button" class="button button--inverse toggle-next toggle-next--fixedwidth"><span class="inactive">Show</span><span class="active">Hide</span></button>
                        <table class="table u-hidden">
                            <thead>
                            <tr>
                                <th>Field</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="api-field"><code>id</code></td>
                                <td>ID of the image.</td>
                            </tr>
                            <tr>
                                <td class="api-field"><code>errors</code></td>
                                <td>Array of objects containing any <a href="/doc-overview/#image-errors" title="Image errors">errors</a> associated with this image.</td>
                            </tr>
                            <tr>
                                <td class="api-field"><code>warnings</code></td>
                                <td>Array of objects containing any <a href="/doc-overview/#image-warnings" title="Image warnigns">warnings</a> associated with this image.</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>array</td>
                </tr>
                <tr>
                    <td class="api-field"><code>generalErrors</code></td>
                    <td>An array of strings, containing any <a href="/doc-overview/#image-general-errors" title="General errors">top level errors</a> associated with the order.</td>
                    <td>array</td>
                </tr>
                </tbody>
            </table>
            <h3 id="image-general-errors" class="api-block__subtitle">General errors</h3>
            <table class="table">
                <tbody>
                <tr>
                    <td class="api-field"><code>AccountBalanceInsufficient</code></td>
                    <td>You cannot submit any more orders until you have paid off the balance outstanding on your account.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>ItemsContainingErrors</code></td>
                    <td>One or more of the images in the order has errors- see the photos object for more information.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>NoItemsInOrder</code></td>
                    <td>The order has no images associated with it, so cannot be submitted.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>PostalAddressNotSet</code></td>
                    <td>The recipient address fields on the order were not properly set. You must supply at least <code>address1</code>, <code>addressTownOrCity</code>, <code>postalOrZipCode</code> and <code>countryCode</code>.</td>
                </tr>
                </tbody>
            </table>
            <h3 id="image-errors" class="api-block__subtitle">Image errors</h3>
            <table class="table">
                <tbody>
                <tr>
                    <td class="api-field"><code>FileCouldNotBeDownloaded</code></td>
                    <td>We could not download an image from the supplied URL, after multiple attempts.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>NoImageFile</code></td>
                    <td>You haven't submitted an image URL nor have you POSTed an image.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>InvalidImageFile</code></td>
                    <td>Image file format is not valid.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>ZeroCopies</code></td>
                    <td>Number of copies of the image has been set to zero.</td>
                </tr>
                </tbody>
            </table>
            <h3 id="image-warnings" class="api-block__subtitle">Image warnings</h3>
            <table class="table">
                <tbody>
                <tr>
                    <td class="api-field"><code>CroppingWillOccur</code></td>
                    <td>The image supplied does not match the aspect ratio of the printing area of the product. We will need to crop or resize it.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>PictureSizeTooSmall</code></td>
                    <td>The image supplied is below the recommended resolution.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>CouldNotValidateImageSize</code></td>
                    <td>You've supplied an image with a URL, but we haven't downloaded it yet. This means we can't check the image size at the moment.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>CouldNotValidateAspectRatio</code></td>
                    <td>You've supplied an image with a URL, but we haven't downloaded it yet. This means we can't check the aspect ratio at the moment.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>AttributeNotValid</code></td>
                    <td>One of the product attributes set on the image is invalid.</td>
                </tr>
                </tbody>
            </table>
            <h3 class="api-block__subtitle">Errors</h3>
            <ul>
                <li><code>404</code> Order with the specified id was not found.</li>
            </ul>
        </div>
        <div id="orders-update-status" class="api-block">
            <h2 class="api-block__title">Submit an order / update status</h2>
            <p>Update the status of an order, for example to submit or cancel it.</p>
            <h3 class="api-block__subtitle">URL</h3>
            <p><strong>POST</strong> <code>/v3.0/orders/{id}/status</code></p>
            <h3 class="api-block__subtitle">Parameters</h3>
            <table class="table">
                <tbody>
                <tr>
                    <td class="api-field"><code>id</code></td>
                    <td>Order id (URL parameter).</td>
                </tr>
                <tr>
                    <td class="api-field"><code>status</code></td>
                    <td>Status to which the order should be updated (POST parameter). Valid values are <code>Cancelled</code>, <code>AwaitingPayment</code> or <code>Submitted</code>.</td>
                </tr>
                </tbody>
            </table>
            <h3 class="api-block__subtitle">Returned values</h3>
            <p>An HTTP status code denoting success or failure.</p>
            <ul>
                <li><code>200</code> The photo was deleted.</li>
                <li><code>400</code> One or more of the input parameters was invalid.</li>
                <li><code>402</code> Payment requires authorisation.</li>
                <li><code>403</code> The order cannot be transitioned to the supplied status from its current status.</li>
                <li><code>404</code> Order with the specified id was not found.</li>
            </ul>
            <h3 class="api-block__subtitle">Payments requiring authorisation</h3>
            <p>Due to recent Strong Customer Authentication updates, for orders placed within the European Economic Area (EEA), additional authorisation may be required for payments made online. If your order requires authorisation by your bank or card provider, we will return a status of <code>402</code>. The body of this response will follow this format:</p>
            <pre>  {
    "data": {
        "url": "https://dashboard.prodigi.com/payment/{authorisation-id}",
        "paymentRequest": 52
    },
    "statusTxt": "Payment Authorization Required",
    "statusCode": 402
}
</pre>
            <p>The URL provided in the response body should be used to provide authorisation for the payment before the order will be processed for fulfilment. Until authorisation is made, the order will remain as <code>AwaitingPayment</code>.</p>
        </div>
        <div id="orders-cancel" class="api-block">
            <h2 class="api-block__title">Cancel an order</h2>
            <p>To cancel an order you will need to <a href="/doc-overview/#orders-update-status" title="Update order status">update its status</a> with an appropriate value.</p>
        </div>
    </section>
    <section class="api-section" id="images">
        <div class="api-section__intro">
            <h2 class="api-section__title">Images</h2>
        </div>
        <div id="images-object" class="api-block">
            <h2 class="api-block__title">Image object</h2>
            <table class="table table--striped table--full">
                <thead>
                <tr>
                    <th class="api-field">Field</th>
                    <th>Description</th>
                    <th>Type</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="api-field"><code>id</code></td>
                    <td>Unique integer identifying the image.</td>
                    <td>integer</td>
                </tr>
                <tr>
                    <td class="api-field"><code>url</code></td>
                    <td>If image is to be downloaded by Packt+, the image's URL.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>status</code></td>
                    <td>
                        Current status of the image. <button type="button" class="button button--inverse toggle-next toggle-next--fixedwidth"><span class="inactive">Show</span><span class="active">Hide</span></button>
                        <table class="table u-hidden">
                            <tbody>
                            <tr>
                                <td class="api-field"><code>AwaitingUrlOrData</code></td>
                                <td>There are two ways of uploading a file to Packt+. You can either specify a <code>url</code> or you can POST using a multi-part upload. If you see this status, it means you have yet to do either for this image.</td>
                            </tr>
                            <tr>
                                <td class="api-field"><code>NotYetDownloaded</code></td>
                                <td>You have specified a <code>url</code> associated with the image, but Packt+ hasn't yet downloaded it. There's nothing you need to do about this.</td>
                            </tr>
                            <tr>
                                <td class="api-field"><code>Ok</code></td>
                                <td>We've received your image and verified it is a valid file format. All is ready to go.</td>
                            </tr>
                            <tr>
                                <td class="api-field"><code>FileNotFoundAtUrl</code></td>
                                <td>We tried using the <code>url</code> you specified to grab the image, but we didn't find it there.</td>
                            </tr>
                            <tr>
                                <td class="api-field"><code>Invalid</code></td>
                                <td>You uploaded a file, but it wasn't in a valid format, or we checked the url you specified and didn't find a valid image there.</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>copies</code></td>
                    <td>Number of copies of the image to include in the order.</td>
                    <td>integer</td>
                </tr>
                <tr>
                    <td class="api-field"><code>sizing</code></td>
                    <td>How the image should be <a href="/doc-overview/#image-resizing" title="Image resizing">resized</a> when printing.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>price</code></td>
                    <td>The amount (in cents/pence) that Packt+ will charge you for this item.</td>
                    <td>integer</td>
                </tr>
                <tr>
                    <td class="api-field"><code>priceToUser</code></td>
                    <td>If payment is set to <code>InvoiceRecipient</code> then the price (in cents/pence) you want to charge for this item.</td>
                    <td>integer</td>
                </tr>
                <tr>
                    <td class="api-field"><code>md5Hash</code></td>
                    <td>The md5 hash of the image file (when available).</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>previewUrl</code></td>
                    <td>A URL to image <strong>after</strong> cropping.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>thumbnailUrl</code></td>
                    <td>A URL that will serve up a thumbnail of the image <strong>after</strong> cropping.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>sku</code></td>
                    <td>An identification code of the product associated with this image.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>attributes</code></td>
                    <td>An object containing all the attributes set on the object.</td>
                    <td>object</td>
                </tr>
                <tr>
                    <td class="api-field"><code>errorMessage</code></td>
                    <td>Detail about any error on the request.</td>
                    <td>string</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div id="images-add" class="api-block">
            <h2 class="api-block__title">Add an image to an order</h2>
            <h3 class="api-block__subtitle">URL</h3>
            <p><strong>POST</strong> <code>/v3.0/orders/{orderId}/images</code></p>
            <h3 class="api-block__subtitle">Parameters</h3>
            <table class="table table--striped">
                <tbody>
                <tr>
                    <td class="api-field"><code>orderId</code></td>
                    <td>The ID of the order (in URL).</td>
                </tr>
                <tr>
                    <td class="api-field"><code>sku</code></td>
                    <td>An identification code of the product for this image.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>url</code></td>
                    <td>The image's URL.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>copies</code></td>
                    <td>Number of copies of the image to include in the order.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>sizing</code></td>
                    <td>How the image should be <a href="/doc-overview/#image-resizing" title="Image resizing">resized</a> when printing.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>priceToUser</code> <em class="api-field__property">optional</em></td>
                    <td>If payment is set to <code>InvoiceRecipient</code> then the price (in cents/pence) you want to charge for each copy. Only available if your payment option is <code>InvoiceRecipient</code>.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>md5Hash</code> <em class="api-field__property">optional</em></td>
                    <td>An MD5 hash of the image file.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>attributes</code> <em class="api-field__property">optional</em></td>
                    <td>An object with properties representing the attributes for the image.</td>
                </tr>
                </tbody>
            </table>
            <h3 class="api-block__subtitle">Returned values</h3>
            <p>Information about the created image. See the <a href="/doc-overview/#images-object" title="Image object">image object</a> for example response.</p>
            <h3 class="api-block__subtitle">Errors</h3>
            <ul>
                <li><code>400</code> Bad or missing input parameter- see error for more details.</li>
                <li><code>403</code> The order is in a state where images cannot be added, e.g. <code>Complete</code>.</li>
                <li><code>404</code> The order with the specified orderId was not found.</li>
            </ul>
        </div>
        <div id="images-add-batch" class="api-block">
            <h2 class="api-block__title">Add multiple images to an order</h2>
            <h3 class="api-block__subtitle">URL</h3>
            <p><strong>POST</strong> <code>/v3.0/orders/{orderId}/images/batch</code></p>
            <h3 class="api-block__subtitle">Parameters</h3>
            <table class="table">
                <tbody>
                <tr>
                    <td class="api-field"><code>orderId</code></td>
                    <td>The ID of the order (in URL).</td>
                </tr>
                </tbody>
            </table>
            <p>The body of the HTTP request should contain an array of objects with the following structure.</p>
            <table class="table table--striped">
                <tbody>
                <tr>
                    <td class="api-field"><code>sku</code></td>
                    <td>An identification code of the product for this image.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>url</code></td>
                    <td>The image's URL.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>copies</code></td>
                    <td>Number of copies of the image to include in the order.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>sizing</code></td>
                    <td>How the image should be <a href="/doc-overview/#image-resizing" title="Image resizing">resized</a> when printing.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>priceToUser</code> <em class="api-field__property">optional</em></td>
                    <td>If payment is set to <code>InvoiceRecipient</code> then the price (in cents/pence) you want to charge for each copy. Only available if your payment option is <code>InvoiceRecipient</code>.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>md5Hash</code> <em class="api-field__property">optional</em></td>
                    <td>An MD5 hash of the image file.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>attributes</code> <em class="api-field__property">optional</em></td>
                    <td>An object with properties representing the attributes for the image.</td>
                </tr>
                </tbody>
            </table>
            <h3 class="api-block__subtitle">Sample response</h3>
            <pre>{
    "errorMessage": null,
    "items": [
              {
                "id": 3456,
                "type": "4x6",
                "url": "http://www.flickr.com/mytestphoto.jpg",
                "status": "NotYetDownloaded",
                "copies": "4",
                "sizing": "Crop",
                "priceToUser" : 214,
                "price" : 199,
                "md5Hash" : "79054025255fb1a26e4bc422aef54eb4",
                "previewUrl" : "http://s3.amazonaws.com/anexampleurl",
                "thumbnailUrl" : "http://s3.amazonaws.com/anexamplethumbnailurl",
                "attributes": {
                                "frameColour" : "silver"
                              }
              },
              {
                "id" : 4567,
                ...
              },
              ...
            ]
}</pre>
            <h3 class="api-block__subtitle">Returned values</h3>
            <table class="table">
                <thead>
                <tr>
                    <th class="api-field">Field</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="api-field"><code>errorMessage</code></td>
                    <td>Detail about any error on the request.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>items</code></td>
                    <td>An array of objects representing the created images. See the <a href="/doc-overview/#images-object" title="Image object">image object</a> for more information.</td>
                    <td>array</td>
                </tr>
                </tbody>
            </table>
            <h3 class="api-block__subtitle">Errors</h3>
            <ul>
                <li><code>400</code> Bad or missing input parameter- see error for more details.</li>
                <li><code>403</code> The order is in a state where images cannot be added, e.g. <code>Complete</code>.</li>
                <li><code>404</code> The order with the specified orderId was not found.</li>
            </ul>
        </div>
        <div id="image-resizing" class="api-block">
            <h2 class="api-block__title">Image resizing</h2>
            <p>If your image does not fit the product size, by default we will crop your image centrally. We print the image as large as possible, removing the top/bottom or left/right parts of the image that go beyond the print area.</p>
            <p>However, you can also specify a <code>sizing</code> parameter to change this behaviour.</p>
            <table class="table table--striped">
                <tbody>
                <tr>
                    <td class="api-field"><code>Crop</code> <em class="api-field__property">default</em></td>
                    <td>Your image will be centred and cropped so that it exactly fits the aspect ratio (height divided by width) of the printing area of the product you chose. Your image will cover all of the product print area.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>ShrinkToFit</code></td>
                    <td>Your image will be shrunk until the whole image fits within the print area of the product, whilst retaining the aspect ratio of your image. This will usually mean there is white space at the top/bottom or left/right edges.</td>
                </tr>
                <tr>
                    <td class="api-field"><code>ShrinkToExactFit</code></td>
                    <td>Your image will be resized so that it completely fills the print area of the product. If the aspect ratio of your image is different to that of the printing area, your image will be stretched or squashed to fit.</td>
                </tr>
                </tbody>
            </table>
            <h3 class="api-block__subtitle">Rotation</h3>
            <p> Packt+ will automatically try to rotate your images so that they need the least possible resizing to fit the product size. For example, if you are creating a 10 x 15 photo, and upload an image that is 4500px x 3000px, then Packt+ will flip it round so it is 3000px x 4500px and thus fits the photo perfectly. </p>
        </div>
    </section>-->
    <section class="api-section" id="shipments">
        <div class="api-section__intro">
            <h2 class="api-section__title">Dummy</h2>
        </div>
        <div id="shipment-object" class="api-block">
            <h2 class="api-block__title">The Dummy object</h2>
            <table class="table table--striped">
                <thead>
                <tr>
                    <th class="api-field">Field</th>
                    <th>Description</th>
                    <th>Type</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="api-field"><code>shipmentId</code></td>
                    <td>The unique identifier for this shipment. Null if order hasn't been submitted.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>isTracked</code></td>
                    <td>Whether the order will be tracked.</td>
                    <td>boolean</td>
                </tr>
                <tr>
                    <td class="api-field"><code>trackingNumber</code></td>
                    <td>Tracking number, when available.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>trackingUrl</code></td>
                    <td>Tracking URL, when available.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>earliestEstimatedArrivalDate</code></td>
                    <td>Estimated earliest arrival of shipment. *</td>
                    <td>datetime</td>
                </tr>
                <tr>
                    <td class="api-field"><code>latestEstimatedArrivalDate</code></td>
                    <td>Estimated latest arrival of shipment. *</td>
                    <td>datetime</td>
                </tr>
                <tr>
                    <td class="api-field"><code>shippedOn</code></td>
                    <td>The shipping date. Null if the order hasn't been shipped.</td>
                    <td>datetime</td>
                </tr>
                <tr>
                    <td class="api-field"><code>carrier</code></td>
                    <td>The shipping carrier used once a shipment has been dispatched: <code>RoyalMail</code>, <code>RoyalMailFirstClass</code>, <code>RoyalMailSecondClass</code>, <code>FedEx</code>, <code>FedExUK</code>, <code>FedExIntl</code>, <code>Interlink</code>, <code>UPS</code>, <code>UpsTwoDay</code>, <code>UKMail</code>, <code>TNT</code>, <code>ParcelForce</code>, <code>DHL</code>, <code>UPSMI</code>, <code>DpdNextDay</code>, <code>EuPostal</code>, <code>AuPost</code>, <code>AirMail</code>, <code>NotKnown</code>. </td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>photoIds</code></td>
                    <td>The IDs in the top-level <code>image</code> object.</td>
                    <td>array</td>
                </tr>
                </tbody>
            </table>
            <p class="table-footnote">* Arrival estimates are beyond our control and are based on typical seasonal processing times and published shipping times for the shipment method relevant to the order.</p>
        </div>
    </section>
    <section class="api-section" id="countries">
        <div class="api-section__intro">
            <h2 class="api-section__title">Dummy Countries</h2>
        </div>
        <div id="countries-list" class="api-block">
            <h2 class="api-block__title">List all Dummy countries</h2>
            <p>This returns the list of all countries available in the system.</p>
            <h3 class="api-block__subtitle">URL</h3>
            <!--<p><strong>GET</strong> <code>/v3.0/countries</code></p>-->
            <h3 class="api-block__subtitle">Sample response</h3>
            <pre>[
    {
        "name": "UNITED KINGDOM",
        "isoCode": "GB"
    },
    {
        "name": "UNITED STATES",
        "isoCode": "US"
    },
    ...
]</pre>
            <h3 class="api-block__subtitle">Returned values</h3>
            <table class="table">
                <tbody>
                <tr>
                    <td class="api-field"><code>countryCode</code></td>
                    <td>Two-letter country code of the country.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>name</code></td>
                    <td>Name of the country.</td>
                    <td>string</td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
    <section class="api-section" id="catalogue">
        <div class="api-section__intro">
            <h2 class="api-section__title">Catalogue</h2>
        </div>
        <div id="catalogue-prices" class="api-block">
            <h2 class="api-block__title">Fetch prices</h2>
            <h3 class="api-block__subtitle">URL</h3>
            <!--<p><strong>POST</strong> <code>/v3.0/catalogue/prodigi%20direct/destination/{countryCode}/prices</code></p>-->
            <h3 class="api-block__subtitle">Parameters</h3>
            <table class="table">
                <tbody>
                <tr>
                    <td class="api-field"><code>countryCode</code></td>
                    <td>Two-letter country code where the order will be delivered (in URL).</td>
                </tr>
                <tr>
                    <td class="api-field"><code>skus</code></td>
                    <td>An array with SKUs of products to check.</td>
                </tr>
                </tbody>
            </table>
            <h3 class="api-block__subtitle">Sample response</h3>
            <pre>{
   "prices": [
       {
           "sku": "ART-PRI-HPG-20X28-PRODIGI_GB",
           "price": 2050,
           "currency": "GBP"
       },
       {
           "sku": "ART-FAP-CPP-6X6-PRODIGI_GB",
           "price": 250,
           "currency": "GBP"
       }
   ]
}</pre>
            <h3 class="api-block__subtitle">Returned values</h3>
            <table class="table table--striped">
                <tbody>
                <tr>
                    <td class="api-field"><code>sku</code></td>
                    <td>An identification code of the product.</td>
                    <td>string</td>
                </tr>
                <tr>
                    <td class="api-field"><code>price</code></td>
                    <td>The amount (in cents/pence) that Packt+ will charge you for this product.</td>
                    <td>integer</td>
                </tr>
                <tr>
                    <td class="api-field"><code>currency</code></td>
                    <td>Currency code in which product is priced.</td>
                    <td>string</td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
    <section class="api-section" id="other-versions">
        <div class="api-section__intro">
            <h2 class="api-section__title">API versions</h2>
        </div>
        <div id="current-version" class="api-block">
            <h2 class="api-block__title">Current version</h2>
            <p>The latest version of our API is <a href="/doc-overview/" title="Current Packt+ API documentation">v3.0</a>.</p>
            <p>All new clients should ensure they integrate with this version.</p>
        </div>
        <div id="previous-versions" class="api-block">
            <h2 class="api-block__title">Previous versions</h2>
            <p>For existing clients who are already integrated with our service, documentation for older versions of our API is available below. All new clients should ensure they integrate with the latest version, <a href="/doc-overview/" title="Current Pwinty API documentation">v3.0</a>.</p>
            <ul class="bulleted spaced">
                <li><a href="/doc-overview/2.2/" title="View documentation for Packt+ API v2.2">v2.2</a></li>
                <li><a href="/doc-overview/2.3/" title="View documentation for Packt+ API v2.3">v2.3</a></li>
                <li><a href="/doc-overview/2.5/" title="View documentation for Packt+ API v2.5">v2.5</a></li>
                <li><a href="/doc-overview/2.6/" title="View documentation for Packt+ API v2.6">v2.6</a></li>
            </ul>
        </div>
    </section>
    <section class="api-section api-section--footer">
        <div class="api-block">
            <p class="api-block--footer__info">© 2020 Packt+ Ltd, | <a href="/terms-of-use" title="Terms of use">Terms of use</a> | <a href="/privacy-policy" title="Privacy policy">Privacy policy</a></p>
        </div>
    </section>
</div>
