<template>
    <div class="row" id="top">
        <div class="col-xl-12">
            <div class="card mg-b-20">

                <div class="card-header main-div pb-0" v-for="(puple,index) in data" :key="puple.id">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex justify-content-between">
                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                                data-toggle="modal" href="#modaldemo8"> </a>
                        </div>
                    </div>
                    <div class="card-body center">
                        <div class="main-img-user avatar-xxl d-none d-sm-block"><img alt="avatar" class="rounded-circle"
                                src="user_id/school-student-icon-18.png"></div>
                        <p>
                        </p>
                        <h4 class="content-title mb-0 my-auto">
                            <p></p>
                        </h4>
                        <p>
                        </p>
                        <h4 class="content-title mb-0 my-auto"></h4>
                        <p>
                        </p>
                        <h4 class="content-title mb-0 my-auto"></h4>
                    </div>


                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-10p border-bottom-0">إسم الطالب</th>
                                    <th class="wd-10p border-bottom-0">Student Name</th>
                                    <th class="wd-10p border-bottom-0"> الرقم الشخصي</th>
                                    <th class="wd-10p border-bottom-0">إسم المدرسة</th>
                                    <th class="wd-25p border-bottom-0">المرحلة التعليمية </th>
                                    <th class="wd-25p border-bottom-0">صورة الطالب</th>
                                    <th class="wd-25p border-bottom-0">الملاحظات </th>

                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td v-text="++index"></td>
                                    <td>{{puple.student_name}}</td>
                                    <td>{{puple.student_nameen}}</td>
                                    <td>{{puple.student_idno}}</td>
                                    <td>{{puple.school_name}}</td>
                                    <td>{{puple.edu_level}}</td>
                                    <td>{{puple.edu_level}}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import { computed, ref } from '@vue/runtime-core';
import talkify from 'talkify-tts';

export default {

    data() {
        return {
            data: [],
            file: 'http://soundbible.com/mp3/analog-watch-alarm_daniel-simion.mp3'
        }
    },
    watch: {
        data: {
            handler: function (newValue) {
                this.scroll()
                // this.playSound()
            },
            deep: true
        }
    },
    methods: {
        scroll() {
            setTimeout(function () {
                let elmnt = document.getElementById('top');
                elmnt.scrollIntoView(false);
            }, 100);
        },
        // playSound() {
        //     var audio = new Audio(this.file);
        //     audio.play();
        // }
    },

    mounted() {
        window.Echo.channel("rfid").listen('NotificationRecieved', event => {


            // player.config = {
            //     ui:
            //     {
            //         audioControls: { //disable to provide your own player or use Talkify headless.
            //             enabled: true,
            //             controlcenter: "local", //["modern", "classic", "local", "native"]
            //             container: document.body,
            //             voicepicker: {
            //                 enabled: true, //Applicable on modern and classic control centers
            //                 filter: {
            //                     byClass: ["Exclusive"], //Not applicable for Html5Player,  example: ["Standard", "Premium", "Exclusive", "Neural"]
            //                     byCulture: ["ar-SA"], //example: ["en-EN", "en-AU"]
            //                     byLanguage: ['Arabic'] //Not applicable for Html5Player, example: ["English", "Spanish"]
            //                 }
            //             }
            //         }
            //     },
            // };
            const talkify = window.talkify;
            const player = new window.talkify.Html5Player();
            player.forceLanguage('en-US');
            this.data.push(event.data)
            setTimeout(function () {
                player.playText('The Student Name is ' + event.data.student_nameen);
            }, 300);
        })
    }
}
</script>

<style>
.main-div {
    margin-top: 20px;
    margin-bottom: 20px;
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background: rgb(212, 212, 212) !important;
    background-clip: border-box;
    border-radius: 5px;
    border: 1px solid #deebfd;
    margin-bottom: 1.3rem;
    box-shadow: -8px 12px 18px 0 #dadee8;
}
</style>
