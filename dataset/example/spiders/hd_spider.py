from scrapy.contrib.spiders import CrawlSpider, Rule
from scrapy.contrib.linkextractors.sgml import SgmlLinkExtractor
from scrapy.selector import HtmlXPathSelector
from example.items import ExampleItem


class ExampleSpider(CrawlSpider):
    name = 'example'
    start_urls = ['https://tr.sputniknews.com/haberler/']
    rules = [Rule(SgmlLinkExtractor(allow=[r'\?page=\d+']), follow=False),
             Rule(SgmlLinkExtractor(allow=[r'\w+.html']), callback='parse_blogpost')]

    def parse_blog(self, response):
        hxs = HtmlXPathSelector(response)
        item = ExampleItem()

        item['title']       = hxs.select("//div[@class='span9']/h1/a/text()").extract()
        item['description'] = hxs.select("//div[@class='span9']/p[@class='lead']/text()").extract()
        item['date']        = hxs.select("//div[@class='span9']/h1/small/text()").extract()
        item['post']        = hxs.select("//div[@class='span9']/p/text()").extract()
        return item