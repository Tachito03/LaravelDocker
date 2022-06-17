<template>
    <div class="layout-px-spacing">
        <portal to="breadcrumb">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:;">Components </a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Pricing Tables</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </portal>

        <div class="row">
            <div class="col-lg-12 layout-spacing layout-top-spacing">
                <div class="statbox panel box box-shadow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Toggle</h4>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="container pricing-table">

                            <!-- Pricing Plans Container -->
                            <div class="pricing-plans-container mt-5 d-md-flex d-block">
                                <div v-for="(plan, i) in planes" :key="i" class="pricing-plan mb-5" v-bind:class="plan.id==2 ?'mt-md-0 recommended': ''">
                                    <div v-if="plan.id==2" class="recommended-badge">Estándar</div>
                                    <h3>{{ plan.name }}</h3>
                                    <p class="margin-top-10">{{ plan.description }}</p>
                                    <div class="pricing-plan-label billed-monthly-label"><strong>$ {{ plan.price  }}</strong>/ {{ plan.stripe_plan }}</div>
                                    <div class="pricing-plan-features mb-4">
                                        <strong>Caracteristicas</strong>
                                        <ul>
                                            <li>Caract 1</li>
                                            <li>Caract 1</li>
                                            <li>Caract 1</li>
                                        </ul>
                                    </div>
                                    
                                    <b-button v-if="suscritos[i]" class="button margin-top-20" variant="success" block>Suscrito</b-button>
                                    <div v-else class="btn-with-link">
                                        <router-link :to="{name:'subscripciones', params:{plan: plan.slug}}">
                                            <b-button class="button margin-top-20" variant="dark" block>Suscríbete</b-button>
                                        </router-link>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import '@/assets/sass/scrollspyNav.scss';
    import '@/assets/sass/pricing-table.scss';
    import highlight from '@/components/plugins/highlight.vue';
    import axios from 'axios';

    export default {
        metaInfo: { title: 'Pricing Tables' },
        components: {
            highlight
        },
        data() {
            return {
                code_arr: [],
                chk_demo: false,
                planes: {},
                suscritos: [],
                
            };
        },
        mounted() {
           this.obtienePlanes();
        },
        methods: {
            toggleCode(name) {
                if (this.code_arr.includes(name)) {
                    this.code_arr = this.code_arr.filter(d => d != name);
                } else {
                    this.code_arr.push(name);
                }
            },
            async obtienePlanes(){
                

                axios.get('/api/suscription/plans').then((response) =>{
                     this.planes = response.data.planes;
                     for(var x=0; x < this.planes.length; x++){
                        axios.get(`/api/suscription/check/${this.planes[x].stripe_product_id}/${this.planes[x].name}`).then((response) =>{
                            this.suscritos.push(response.data.status)
                        });
                     }

                     console.log('suscritos', this.suscritos)
                });
            }
        }
    };
</script>
