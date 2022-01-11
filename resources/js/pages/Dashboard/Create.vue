<template>
    <div class="project-page bg-purple-progress">
        <Navbar />
        <section class="container mx-auto pt-8 relative">
            <div class="flex justify-between items-center">
                <div class="w-full mr-6">
                    <h2 class="text-4xl text-white mb-2 font-medium">Dashboard</h2>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <div class="w-3/4 mr-6">
                    <h3 class="text-2xl text-white mb-4">Create New Projects</h3>
                </div>

            </div>
            <div class="block mb-2">
                <div class="w-full lg:max-w-full lg:flex mb-4">
                    <div class="w-full border border-gray-400 bg-white rounded p-8 flex flex-col justify-between leading-normal">
                        <form class="w-full">
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                        Campaign Name
                                    </label>
                                    <input
                                        v-model="form.name"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        type="text"
                                        placeholder="Contoh: Mechanical Keyboard"
                                    />
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                        Target Sukarelawan
                                    </label>
                                    <input
                                        v-model="form.goal_amount"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        type="number"
                                        placeholder="Contoh: 200000"
                                    />
                                </div>
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-3">
                                        Deskripsi Singkat
                                    </label>
                                    <input
                                        v-model="form.excerpt"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        type="text"
                                        placeholder="Deskripsi singkat mengenai projectmu"
                                    />
                                </div>
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                        Tanggungan untuk Sukarelawan
                                    </label>
                                    <input
                                        v-model="form.perks"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        type="text"
                                        placeholder="Contoh: Ayam, Nasi Goreng, Piring"
                                    />
                                </div>
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                        Deskripsi Panjang
                                    </label>
                                    <textarea
                                        v-model="form.description"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        type="text"
                                        placeholder="Isi deskripsi panjang untuk projectmu"
                                    ></textarea>
                                </div>
                                <div class="w-full px-3">
                                    <button
                                        @click="savePedulikasih"
                                        class="bg-green-button hover:bg-green-button text-white font-bold px-4 py-1 rounded inline-flex items-center"
                                    >
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <Footer />
    </div>
</template>

<script>
import Navbar from "../../components/Navbar";
import Footer from "../../components/Footer";
import { reactive } from "vue";
import useCampaign from "../../composables/campaign";
export default {
    name: "CreateCampaign",
        setup() {
        let form = reactive({
            'name': '',
            'goal_amount': '',
            'excerpt': '',
            'perks': '',
            'description': '',
        })

        const { errors, storePedulikasih } = useCampaign()

        const savePedulikasih = async () =>  {
            await storePedulikasih({...form});
        }

        return {
            form,
            errors,
            savePedulikasih,
        }
    },
    components: { Navbar, Footer },
}
</script>

<style scoped>

</style>
