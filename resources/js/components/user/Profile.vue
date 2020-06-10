<template>

    <div class="container">
        <div class="user-card__container">
            <div class="user-card">
                
                <div class="user-card__bg-img">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cookies.jpg" alt="">

                    <div class="user-card__img">
                        <img src="https://www.buro247.ru/thumb/300x300_5/images/GettyImages-1181163940_2.jpg.webp" alt="">
                    </div>

                </div>

                <div class="user-card__info">
                    <div class="user-card__name">
                        <span class="first-letter" >M</span>argo
                        <span class="first-letter">R</span>obby
                    </div>
                </div>


                <div class="activity">

                    <div class="activity__rating">
                        <font-awesome-icon :icon="['fas', 'star']" />
                        <font-awesome-icon :icon="['fas', 'star']" />
                        <font-awesome-icon :icon="['fas', 'star']" />
                        <font-awesome-icon :icon="['fas', 'star']" />
                        <font-awesome-icon :icon="['fas', 'star']" />
                    </div>

                    <div class="activity__container">

                        <div class="activity__item">
                            <div class="activity__item-name">
                                <div class="activity__item-icon">
                                    <font-awesome-icon :icon="['fas', 'star']" />
                                </div>
                            </div>
                            <div class="activity__item-value">
                                5.0
                            </div>
                        </div>

                        <div class="activity__item">
                            <div class="activity__item-name">
                                <div class="activity__item-icon">
                                    <div class="following-icon">
                                        <div class="following-icon__arrow">
<!--
                                            <font-awesome-icon :icon="['fas', 'arrow-right']"  />
-->
                                        </div>
                                        <font-awesome-icon :icon="['fas', 'user']" />
                                    </div>
                                </div>
                            </div>
                            <div class="activity__item-value">
                                100
                            </div>
                        </div>

                        <div class="activity__item">
                            <div class="activity__item-name">
                                <div class="activity__item-icon">
                                    <font-awesome-icon :icon="['fas', 'user']" />
                                </div>
                            </div>
                            <div class="activity__item-value">
                                100
                            </div>
                        </div>

                        <div class="activity__item">
                            <div class="activity__item-name">
                                <div class="activity__item-icon">
                                    <font-awesome-icon :icon="['fas', 'newspaper']" />
                                </div>
                            </div>
                            <div class="activity__item-value">
                                100
                            </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>

</template>

<script>
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'


    export default {
        name: "Profile",
        components: {
            FontAwesomeIcon,
        }
    }
</script>

<style lang="scss" scoped>


    .following-icon {
        position: relative;

        &__arrow {
            position: absolute;
            left: 16px;
            top: 9px;
            color: #21c826;
            font-size: 21px;
        }
    }

    .first-letter {
        color: #847d7d;
    }

    .user-card__container {
        display: flex;
        justify-content: center;
        margin-top: 5rem;
    }

    .user-card {
        max-width: 30rem;
        background: #f7f0f0;
        box-shadow: 0 0 10px rgb(216, 179, 179);

        &__activity {
            width: 90%;
        }

        &__info {
            margin-top: 4.5rem;
            text-align: center;
            font-size: 21px;
        }

        &__bg-img {
            background: black;
            position: relative;
        }

        &__img {
            position: absolute;
            width: 100px;
            left: 100px;
            top: 194px;
        }

        &__img > img{
            width: 100px;
            border-radius: 50%;
            border: 2px solid #fff;
        }

    }
</style>