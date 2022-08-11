getArticles = async () => {
  const response = await fetch(`/api/articles`);

  response.ok; // => false
  response.status; // => 404
  const text = await response.text();

  data = JSON.parse(text);
  return data;
};
