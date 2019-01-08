<template>
    <div id="timeline-wrapper">

        <PostList
            v-bind:timelineData="timelineData"></PostList>
    </div>
</template>

<style scoped>
    #timeline-wrapper {
        display: flex;
        justify-content: center;
    }
</style>

<script>
    import PostList from './PostLists'

    export default {
        name: 'timeline',
        components: {
            PostList
        },
        data() {
            return {
                timelineData: []
            }
        },
        methods: {
            getPosts: function () {
                console.log('get new posts')
                this.timelineData = [
                    {
                        caption: 'Hello world this is a sample caption for post.',
                        image: 'https://images.pexels.com/photos/1639562/pexels-photo-1639562.jpeg?cs=srgb&dl=bread-bun-burger-1639562.jpg&fm=jpg',
                        user: 'Evan',
                    },
                    {
                        caption: 'Hello world this is a sample caption for post.',
                        image: 'https://images.pexels.com/photos/1639562/pexels-photo-1639562.jpeg?cs=srgb&dl=bread-bun-burger-1639562.jpg&fm=jpg',
                        user: 'Evan',
                    },
                    {
                        caption: 'Hello world this is a sample caption for post.',
                        image: 'https://images.pexels.com/photos/1639562/pexels-photo-1639562.jpeg?cs=srgb&dl=bread-bun-burger-1639562.jpg&fm=jpg',
                        user: 'Evan',
                    },
                    {
                        caption: 'Hello world this is a sample caption for post.',
                        image: 'https://images.pexels.com/photos/1639562/pexels-photo-1639562.jpeg?cs=srgb&dl=bread-bun-burger-1639562.jpg&fm=jpg',
                        user: 'Evan',
                    },
                    {
                        caption: 'Hello world this is a sample caption for post.',
                        image: 'https://images.pexels.com/photos/1639562/pexels-photo-1639562.jpeg?cs=srgb&dl=bread-bun-burger-1639562.jpg&fm=jpg',
                        user: 'Evan',
                    },
                    {
                        caption: 'Hello world this is a sample caption for post.',
                        image: 'https://images.pexels.com/photos/1639562/pexels-photo-1639562.jpeg?cs=srgb&dl=bread-bun-burger-1639562.jpg&fm=jpg',
                        user: 'Evan',
                    },
                    {
                        caption: 'Hello world this is a sample caption for post.',
                        image: 'https://images.pexels.com/photos/1639562/pexels-photo-1639562.jpeg?cs=srgb&dl=bread-bun-burger-1639562.jpg&fm=jpg',
                        user: 'Evan',
                    },
                    {
                        caption: 'Hello world this is a sample caption for post.',
                        image: 'https://images.pexels.com/photos/1639562/pexels-photo-1639562.jpeg?cs=srgb&dl=bread-bun-burger-1639562.jpg&fm=jpg',
                        user: 'Evan',
                    },
                    {
                        caption: 'Hello world this is a sample caption for post.',
                        image: 'https://images.pexels.com/photos/1639562/pexels-photo-1639562.jpeg?cs=srgb&dl=bread-bun-burger-1639562.jpg&fm=jpg',
                        user: 'Evan',
                    },
                ]
            }
        },
        created() {
            setTimeout(function () {
                this.getPosts()
            }.bind(this), 4000)
        }
    }
</script>