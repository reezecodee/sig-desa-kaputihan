<script setup lang="ts">

</script>

<template>
    <section id="features" class="features section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Batas Wilayah</h2>
            <p>Informasi Batas Wilayah Seperti Batas Desa, Dusun dan RT/RW</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="d-flex justify-content-center">

                <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">

                    <li class="nav-item">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                            <h4>Batas Desa</h4>
                        </a>
                    </li><!-- End tab nav item -->

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                            <h4>Batas Dusun</h4>
                        </a><!-- End tab nav item -->

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                            <h4>Batas RT/RW</h4>
                        </a>
                    </li><!-- End tab nav item -->

                </ul>

            </div>

            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                <div class="tab-pane fade active show" id="features-tab-1">
                    <div class="embed-container"><iframe width="500" height="400" frameborder="0" scrolling="no"
                            marginheight="0" marginwidth="0" title="Batas RT-RW"
                            src="//www.arcgis.com/apps/Embed/index.html?webmap=4b81724f0ed943e5958afdaa62e5903c&extent=108.2301,-7.4766,108.2707,-7.4549&home=true&zoom=true&previewImage=false&scale=true&details=true&legend=true&active_panel=details&basemap_gallery=true&disable_scroll=true&theme=dark"></iframe>
                    </div>
                </div><!-- End tab content item -->

                <div class="tab-pane fade" id="features-tab-2">
                    <div class="embed-container"><small><a
                                href="//www.arcgis.com/apps/Embed/index.html?webmap=4b81724f0ed943e5958afdaa62e5903c&extent=108.2301,-7.4766,108.2707,-7.4549&home=true&zoom=true&scale=true&details=true&legend=true&active_panel=details&basemap_gallery=true&disable_scroll=true&theme=dark"
                                style="color:#0000FF;text-align:left" target="_blank">View larger
                                map</a></small><br><iframe width="500" height="400" frameborder="0" scrolling="no"
                            marginheight="0" marginwidth="0" title="Batas RT-RW"
                            src="//www.arcgis.com/apps/Embed/index.html?webmap=4b81724f0ed943e5958afdaa62e5903c&extent=108.2301,-7.4766,108.2707,-7.4549&home=true&zoom=true&previewImage=false&scale=true&details=true&legend=true&active_panel=details&basemap_gallery=true&disable_scroll=true&theme=dark"></iframe>
                    </div>
                </div><!-- End tab content item -->

                <div class="tab-pane fade" id="features-tab-3">
                    <div class="embed-container"><small><a
                                href="//www.arcgis.com/apps/Embed/index.html?webmap=4b81724f0ed943e5958afdaa62e5903c&extent=108.2301,-7.4766,108.2707,-7.4549&home=true&zoom=true&scale=true&details=true&legend=true&active_panel=details&basemap_gallery=true&disable_scroll=true&theme=dark"
                                style="color:#0000FF;text-align:left" target="_blank">View larger
                                map</a></small><br><iframe width="500" height="400" frameborder="0" scrolling="no"
                            marginheight="0" marginwidth="0" title="Batas RT-RW"
                            src="//www.arcgis.com/apps/Embed/index.html?webmap=4b81724f0ed943e5958afdaa62e5903c&extent=108.2301,-7.4766,108.2707,-7.4549&home=true&zoom=true&previewImage=false&scale=true&details=true&legend=true&active_panel=details&basemap_gallery=true&disable_scroll=true&theme=dark"></iframe>
                    </div>
                </div>

            </div>

        </div>

    </section>
</template>

<style scoped>
.embed-container {
    position: relative;
    padding-bottom: 80%;
    height: 0;
    max-width: 100%;
}

.embed-container iframe,
.embed-container object,
.embed-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

small {
    position: absolute;
    z-index: 40;
    bottom: 0;
    margin-bottom: -15px;
}
</style>