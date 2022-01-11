import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

export default function useCampaign() {
    const campaign = ref([])
    const errors = ref([])
    const router = useRouter()
    const token = localStorage.access_token


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
            console.log(token)
            await axios.post('/api/pedulikasih/store', data, {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
            await router.push({name: 'Dashboard'})
        } catch (e) {
           console.log(e)
        }
    }

    return {
        campaign,
        getCampaign,
        getCampaignBySlug,
        storePedulikasih
    }
}
