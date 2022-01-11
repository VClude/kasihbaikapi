<template>
    <section class="landing-hero pt-5">
        <div class="header__bg"></div>
        <div class="container mx-auto relative">
            <NavLinks />
            <div v-if="hero" class="flex items-center pt-10 px-5 md:px-0">
                <div class="w-1/2">
                    <h1 class="text-4xl text-white mb-5">
                        Kami Membantu <u class="hero-underline">anda</u> untuk <br />
                        menyalurkan barang & <u class="hero-underline">jasa</u> <br />
                        untuk yang membutuhkan
                    </h1>


                </div>
                <div class="w-1/2 flex justify-center">
                    <img src="/images/hero-image@2x.png" alt="crowdfunding project" />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import NavLinks from "./NavLinks";
export default {
    name: "Navbar",
    props: ['hero'],
    components: {NavLinks}
}
</script>
