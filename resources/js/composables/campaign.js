import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

export default function useCampaign() {
    const campaign = ref([])
    const errors = ref([])
    const getCampaign = async () => {
        let response = await axios.get('/api/pedulikasih')
        campaign.value = response.data.data
    }

    const getCampaignBySlug = async (slug) => {
        let response = await axios.get('/api/pedulikasih/' + slug)
        campaign.value = response.data.data
    }

    const storePedulikasih = async (data) => {
        try {
            console.log(data)
            await axios.post('/api/pedulikasih/store', data)
            // await router.push({name: 'Dashboard'})
        } catch (e) {
            if(e.response.status === 422) {
                for(const key in e.response.data.errors) {
                    errors.value[key] = e.response.data.errors[key][0]
                }
            } else if(e.response.status === 401) {
                errors.value['general'] = e.response.data.error
            }
        }
    }

    return {
        campaign,
        getCampaign,
        getCampaignBySlug,
        storePedulikasih
    }
}
