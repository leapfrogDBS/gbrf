
document.addEventListener("DOMContentLoaded", function (event) {
    new Vue({

        el: '#jobApp',
        watch: {
            pageIndex(val) {
                setTimeout(() => {
                    window.scrollTo({ top: 300, behavior: 'smooth' });
                }, 300);
            }
        },

        methods: {
            searchJobs() {
                this.pageIndex = 0;
                const selectedLocation = this.selectedLocation;
                const selectedCategory = this.selectedCategory;
                const searchTerm = this.searchTerm;
                this.detailedResults = this.allJobs.filter(job => {
                    const locationMatch = !selectedLocation || (job.portalData.location && job.portalData.location.includes(selectedLocation));
                    const categoryMatch = !selectedCategory || (job.portalData.category && job.portalData.category.includes(selectedCategory));
                    const descriptionMatch = job.description?.[0]?.value && job.description[0].value.includes(searchTerm);
                    const headerMatch = job.header?.[0]?.value && job.header[0].value.includes(searchTerm);
                    const categorySearchMatch = job.portalData.category && job.portalData.category.includes(searchTerm);
                    return locationMatch && categoryMatch && (descriptionMatch || headerMatch || categorySearchMatch);
                });
            },




            strippedContent(string) {
                if (string.length > 20) {
                    let nohtml = string.replace(/<\/?[^>]+>/ig, " ")
                    const truncatedString = `${nohtml.slice(0, 300)}...`;
                    return truncatedString.replace(/<\/?[^>]+>/ig, " ");

                }
            },

        },
        computed: {
            pageCount() {
                return this.splitArray.length
            },
            currentPage() {
                return this.splitArray[this.pageIndex]
            },
            splitArray() {
                let chunkSize = this.itemsPerPage
                const res = [];
                for (let i = 0; i < this.detailedResults.length; i += chunkSize) {
                    const chunk = this.detailedResults.slice(i, i + chunkSize);
                    res.push(chunk);
                }
                return res;
            },
        },
        mounted() {
            this.$nextTick(() => {
                let data = JSON.parse(JSON.stringify(careersData));
                let jobs = JSON.parse(data.portal_data.data)
                let filters = JSON.parse(data.filters.data)
                this.categories = filters.filters[0].options
                this.locations = filters.filters[1].options
                this.allJobs = jobs
            })
        },
        data() {
            return {
                allJobs: [],
                searchBegun: false,
                noResults: false,
                itemsPerPage: 6,
                loading: false,
                pageIndex: 0,
                lastId: '',
                page: 0,
                detailedResults: [],
                searchTerm: '',
                categories: [],
                locations: [],
                selectedCategory: '',
                selectedLocation: '',
                portals: ["17", "18", "184", "2874"]
            }
        }
    });
});
