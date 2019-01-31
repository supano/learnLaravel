<template>
    <div class="box">
        <article class="media">
            <div class="media-left">
                <figure class="image is-64x64">
                    <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                </figure>
            </div>
            <div class="media-content">
                <div class="content">
                    <p>
                        {{this.post}}
                    </p>
                </div>
                <nav class="level is-mobile">
                    <div class="level-left">
                        <a class="level-item" aria-label="like">
                            <span class="icon is-small">
                              <i class="fas fa-heart" aria-hidden="true"></i>
                            </span>
                            <p class="love-count">
                                {{this.love}}
                            </p>
                        </a>
                    </div>
                </nav>
            </div>
        </article>
    </div>
</template>

<style scoped>
    .box {
        margin: 10px 0;
    }

    .love-count {
        margin-left: 5px;
    }
</style>

<script>
    export default {
        props: ['post', 'love']
    }
</script>