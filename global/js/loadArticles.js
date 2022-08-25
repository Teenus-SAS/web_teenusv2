getArticles = async () => {
  const response = await fetch(`/api/articles`);

  response.ok;
  response.status;
  const text = await response.text();

  data = JSON.parse(text);
  return data;
};
