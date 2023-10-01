<?
$text = <<<TXT
<p class="big">
	Год основания: <b>1589 г.</b> Волгоград отмечает день города в <b>2-е воскресенье сентября</b>. <br>В <b>2023 году</b> эта дата - <b>10 сентября</b>.
</p>
<p class="float">
	<img src="https://www.calend.ru/img/content_events/i0/961.jpg" alt="Волгоград" width="300" height="200" itemprop="image">
	<span class="caption gray">Скульптура «Родина-мать зовет!» входит в число семи чудес России (Фото: Art Konovalov, по лицензии shutterstock.com)</span>
</p>
<p>
	<i><b>Великая Отечественная война в истории города</b></i></p>
	<p><i>Важнейшей операцией Советской Армии в Великой Отечественной войне стала <a href="https://www.calend.ru/holidays/0/0/1869/">Сталинградская битва</a> (17.07.1942 - 02.02.1943). Целью боевых действий советских войск являлись оборона  Сталинграда и разгром действовавшей на сталинградском направлении группировки противника. Победа советских войск в Сталинградской битве имела решающее значение для победы Советского Союза в Великой Отечественной войне.</i>
</p>
TXT;

define("CYRILLIC", "АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя");

$text = mb_convert_encoding($text, 'HTML-ENTITIES', 'utf-8'); // кодировка
$dom = new DOMDocument();
$dom->loadHTML($text);
$nodes = $dom->getElementsByTagName("*");

$word_count = 0;
$end_flag = False;

foreach ($nodes as $node) {
	for ($child = $node->firstChild; $child; $child = $child->nextSibling) {
		if (! ($child->nodeType === XML_TEXT_NODE && trim($child->textContent))) continue;

		$word_count += str_word_count($child->textContent, 0, CYRILLIC);
		
		if ($end_flag) $child->textContent = '';
		
		if ($word_count >= 29 and ! $end_flag) {
			$word_count -= str_word_count($child->textContent, 0, CYRILLIC);
			$delta = 29 - $word_count;
			$words = explode(" ", $child->textContent);
			$new_words = array_slice($words, 0, $delta);
			$new_words[array_key_last($new_words)] .= "...";
			$child->textContent = implode(" ", $new_words);
			$word_count += str_word_count($child->textContent, 0, CYRILLIC);
			$end_flag = True;
		}
	}
}
?>