['kita', 'atik', 'tika', 'aku', 'kia', 'makan', 'kua']

# Expected Outputs
[
    ["kita", "atik", "tika"],
    ["aku", "kua"],
    ["makan"],
    ["kia"]
 ]


var words = ["dell", "ledl", "abc", "cba"];

var anagrams = {};

for (var i in words) {
    var word = words[i];
    var sorted = sortWord(word);

    if (anagrams[sorted] != null) {
        anagrams[sorted].push(word);
    }     
    else {
        anagrams[sorted] = [ word ];
    }
}

for (var sorted in anagrams) {
    var words = anagrams[sorted];
    var sep = ",";
    var out = "";
    for (var n in words) {
        out += sep + words[n];
        sep = "";
    }
    document.writeln(sorted + ": " + out + "<br />");
}