<?php

namespace helper;

class HtmlHelper
{
    private const DEFAULT_JS_TYPE = 'text/javascript';
    /**
     * @param string $tagName
     * @param array $attribs
     * @param string $content
     * @param bool $escapeContent
     * @return string
     */
    public static function element(
        $tagName = 'div',
        $attribs = [],
        $content = '',
        $escapeContent = false
    ) {
        $attribsHtml = '';
        foreach ($attribs as $key => $val) {
            if (is_string($key) && (is_string($val) || is_numeric($val))) {
                $attribsHtml .= " {$key}=\"{$val}\"";
            } elseif (is_string($val)) {
                $attribsHtml .= " {$val}";
            }
        }
        if ($escapeContent) {
            $content = self::escape($content);
        }
        return
            "<{$tagName}{$attribsHtml}>"
            . $content .
            "</{$tagName}>";
    }
    /**
     * @param string $url
     * @param array $attribs
     * @param string $content
     * @param bool $escapeContent
     * @return string
     */
    public static function textLink($url = '', $attribs = [], $content = '', $escapeContent = false)
    {
        return self::element(
            'a',
            array_merge($attribs, ['href' => $url]),
            $content,
            $escapeContent
        );
    }
    /**
     * @param string $js
     * @return string
     */
    public static function script($js = '')
    {
        return self::element(
            'script',
            ['type' => self::DEFAULT_JS_TYPE],
            $js
        );
    }
    /**
     * @param string $src
     * @param string $type
     * @return string
     */
    public static function jsImport($src, $type = self::DEFAULT_JS_TYPE)
    {
        return self::element(
            'script',
            [
                'src' => $src,
                'type' => $type,
            ]
        );
    }
    /**
     * @param string $url
     * @return string
     */
    public static function favicon($url)
    {
        return self::element('link', ['rel' => 'icon', 'href' => $url, 'type' => 'image/x-icon']);
    }
    /**
     * @param string $title
     * @return string
     */
    public static function title($title) {
        return self::element('title', [], $title);
    }
    /**
     * @param array $attribs
     * @param string $content
     * @param bool $escapeContent
     * @return string
     */
    public static function div($attribs = [], $content = '', $escapeContent = false)
    {
        return self::element('div', $attribs, $content, $escapeContent);
    }
    /**
     * @param string $src
     * @param array $attribs
     * @return string
     */
    public static function inlineImg($src = '', $attribs = [])
    {
        return self::element(
            'img',
            array_merge(
                $attribs,
                [
                    'src'   => $src,
                    'style' => 'height: 1rem; display: inline;',
                ]
            )
        );
    }
    /**
     * @param string $str
     * @return string
     */
    public static function escape($str = '')
    {
        return htmlspecialchars($str);
    }
    /**
     * @param string $type
     * @param array $attribs
     * @return string
     */
    public static function input($type = '', $attribs = [])
    {
        return self::element(
            'input',
            array_merge($attribs, ['type' => $type])
        );
    }
    /**
     * @param array $attribs
     * @return string
     */
    public static function textInput($attribs = [])
    {
        return self::input('text', $attribs);
    }
    /**
     * @param string $name
     * @param array $attribs
     * @param array $options
     * @return string
     */
    public static function selectInput($name = '', $attribs = [], $options = [], $preselectedVal = null)
    {
        $vals = [];
        foreach ($options as $option) {
            if (!isset($option['desc'])
                || empty($option['desc'])
                || !is_string($option['desc'])
                || !isset($option['val'])
            ) {
                continue;
            }
            $attr = ['value' => $option['val']];
            if ($preselectedVal == $option['val']) {
                $attr['selected'] = 'selected';
            }
            $vals[] = HtmlHelper::element(
                'option',
                $attr,
                $option['desc']
            );
        }
        return self::element(
            'select',
            array_merge($attribs, ['name' => $name]),
            implode('', $vals)
        );
    }
    /**
     * @param string $action
     * @param string $method
     * @param string $content
     * @return string
     */
    public static function form($action = '', $method = '', $content = '')
    {
        return self::element(
            'form',
            [
                'action' => (string)$action,
                'method' => strtoupper((string)$method),
            ],
            $content
        );
    }
    /**
     * @param array $attribs
     * @param string $content
     * @param bool $escapeContent
     * @return string
     */
    public static function button($attribs = [], $content = '', $escapeContent = false)
    {
        return self::element('button', $attribs, $content, $escapeContent);
    }
    /**
     * @param array $attribs
     * @param string $content
     * @param bool $escapeContent
     * @return string
     */
    public static function span($attribs = [], $content = '', $escapeContent = false)
    {
        return self::element('span', $attribs, $content, $escapeContent);
    }
    /**
     * @param array $attribs
     * @param string $content
     * @param bool $escapeContent
     * @return string
     */
    public static function table($attribs = [], $content = '', $escapeContent = false)
    {
        return self::element('table', $attribs, $content, $escapeContent);
    }
    /**
     * @param array $attribs
     * @param string $content
     * @param bool $escapeContent
     * @return string
     */
    public static function td($attribs = [], $content = '', $escapeContent = false)
    {
        return self::element('td', $attribs, $content, $escapeContent);
    }
    /**
     * @param array $attribs
     * @param string $content
     * @param bool $escapeContent
     * @return string
     */
    public static function tr($attribs = [], $content = '', $escapeContent = false)
    {
        return self::element('tr', $attribs, $content, $escapeContent);
    }
    /**
     * @param array $attribs
     * @param string $content
     * @param bool $escapeContent
     * @return string
     */
    public static function header($attribs = [], $content = '', $escapeContent = false)
    {
        return self::element('header', $attribs, $content, $escapeContent);
    }

    /**
     * @param array $attribs
     * @param string $content
     * @param bool $escapeContent
     * @return string
     */
    public static function footer($attribs = [], $content = '', $escapeContent = false)
    {
        return self::element('footer', $attribs, $content, $escapeContent);
    }
}