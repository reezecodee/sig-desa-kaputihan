<script setup>
defineProps({
    organization: String
});
</script>

<template>
    <section class="about__v4 section" id="organization">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="img-wrap position-relative">
                        <img class="img-fluid rounded-4"
                            :src="`/placeholder/${organization}`"
                            data-aos="fade-up" data-aos-delay="0">
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
