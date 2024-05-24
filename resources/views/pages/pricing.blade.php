<x-app-layout>

    <!-- Pricing Plan Start -->
    <div class="container-fluid py-5 ">
        <div class="container ">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-0">Medical Packages</h5>
                <h1 class="display-4">Awesome Medical Programs</h1>
            </div>
            <div class="owl-carousel price-carousel position-relative" style="padding: 0 45px 45px 45px;">
                <div class="bg-light rounded text-center">
                    <div class="position-relative">
                        <img class="img-fluid rounded-top" src="img/price-1.jpg" alt="">
                        <div class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center" style="background: rgba(29, 42, 77, .8);">
                            <h3 class="text-white">Basic Plan</h3>
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top fw-normal" style="font-size: 22px; line-height: 45px;">$</small>19.99<small class="align-bottom fw-normal" style="font-size: 16px; line-height: 40px;">/ Month</small>
                            </h1>
                        </div>
                    </div>
                    <div class="text-center py-5">
                        <p class="mb-2">App Medication Reminders</p>
                        <p class="mb-2">App Appointment Reminders</p>
                        <p class="mb-2">Patient Profile System</p>
                        <p class="mb-2">Self-Monitoring Logs</p>
                        <p class="mb-2">Basic Customer Support</p>

                        <a href="{{route('plans.show','basic-plan')}}" class="btn btn-primary rounded-pill py-3 px-5 my-2">Apply Now</a>
                    </div>
                </div>
                <div class="bg-light rounded text-center">
                    <div class="position-relative">
                        <img class="img-fluid rounded-top" src="img/price-2.jpg" alt="">
                        <div class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center" style="background: rgba(29, 42, 77, .8);">
                            <h3 class="text-white">Standard Plan</h3>
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top fw-normal" style="font-size: 22px; line-height: 45px;">$</small>39.99<small class="align-bottom fw-normal" style="font-size: 16px; line-height: 40px;">/ Month</small>
                            </h1>
                        </div>
                    </div>
                    <div class="text-center py-5">
                        <p class="mb-2">SMS Reminders</p>
                        <p class="mb-2">Enhanced Customer Support</p>
                        <p class="mb-2">Document Management Assistance</p>
                        <p class="mb-2">Monthly Summary Reports</p>
                        <p class="mb-2">Comprehensive Health Monitoring</p>

                        <a href="{{route('plans.show','standard-plan')}}" class="btn btn-primary rounded-pill py-3 px-5 my-2">Apply Now</a>
                    </div>
                </div>
                <div class="bg-light rounded text-center">
                    <div class="position-relative">
                        <img class="img-fluid rounded-top" src="img/price-3.jpg" alt="">
                        <div class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center" style="background: rgba(29, 42, 77, .8);">
                            <h3 class="text-white">Premium Plan</h3>
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top fw-normal" style="font-size: 22px; line-height: 45px;">$</small>69.99<small class="align-bottom fw-normal" style="font-size: 16px; line-height: 40px;">/ Month</small>
                            </h1>
                        </div>
                    </div>
                    <div class="text-center py-5">
                        <p class="mb-2">Personalized Voice Call Reminders</p>
                        <p class="mb-2">Medicine Delivery Service</p>
                        <p class="mb-2">Caregiver and Pharmacy Notifications</p>
                        <p class="mb-2">Family Access</p>
                        <p class="mb-2">Priority Customer Support</p>


                        <a href="{{route('plans.show','premium-plan')}}" class="btn btn-primary rounded-pill py-3 px-5 my-2">Apply Now</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Pricing Plan End -->
</x-app-layout>
