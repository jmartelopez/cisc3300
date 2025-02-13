function containsPinecone(str) {
    return str.includes("pinecone");
}

const sentences =[ "I stepped on a pinecone while walking", "I love to eat cake", "My cat is named pinecone", "I love to sleep", "It is raining"];

const foundSentences = sentences.filter(containsPinecone);

console.log(foundSentences);