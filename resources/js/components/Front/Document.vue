<template>
    <input
        v-model="document"
        type="text"
        id="document"
        name="document"
        @keyup="restrictChars()"
    />
</template>
<script>
export default {
    name: "document",
    props: ["documentOld"],
    data() {
        return {
            document: this.documentOld
        };
    },
    mounted() {
        this.restrictChars();
    },
    methods: {
        restrictChars: function() {
            this.document = this.document
                .replace(/[^-A-Za-z0-9]|([-])+/g, "")
                .toLowerCase();
        }
    }
};
</script>
