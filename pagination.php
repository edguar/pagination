<?php

function pagination($params = []) {
    $defaults = [
        "page" => 1,
        "pages" => 1,
        "show_pages" => 5,
        "edges" => 3,
        "url" => "/",
        "query" => "",
        "class" => "pagination",
        "class_active" => "active",
        "page_as_query" => true
    ];

    extract(array_merge($defaults, $params));

    $page = intval($page);
    $pages = intval($pages);
    $show_pages = intval($show_pages);
    $edges = intval($edges);

    if ($pages <= 1) return;

    if (is_array($query)) {
        $query = "?" . http_build_query($query);
    }

    if ($page_as_query) {
        if (!$query) {
            $query = "?";
        }

        $query .= "page={i}";
    } else {
        $url .= "page/{i}";
    }

    $url .= $query;


    $half_displayed = $show_pages / 2;

    if ($page > $half_displayed) {
        $start = ceil(max(min($page - 1 - $half_displayed, $pages - $show_pages), 0));
        $end = ceil(min($page - 1 + $half_displayed, $pages));
    } else {
        $start = 0;
        $end = ceil(min($show_pages, $pages));
    }

    $html = "<ul class='{$class}'>";

    if ($start > 0 && $edges > 0) {
        $_end = min($edges, $start);

        for ($i = 1; $i <= $_end; $i++) {
            $html .= "<li><a href='" . str_replace("{i}", $i, $url) . "'>{$i}</a></li>";
        }

        if ($start > $edges && ($start - $edges != 1)) {
            $html .= "<li><span>...</span></li>";
        } elseif ($start - $edges == 1) {
            $_end = $edges + 1;
            $html .= "<li><a href='" . str_replace("{i}", $_end, $url) . "'>{$_end}</a></li>";
        }
    }

    for ($i = $start + 1; $i <= $end; $i++) {
        if ($i == $page) {
            $html .= "<li class='{$class_active}'><span>{$i}</span></li>";
        } else {
            $html .= "<li><a href='" . str_replace("{i}", $i, $url) . "'>{$i}</a></li>";
        }
    }

    if ($end < $pages && $edges > 0) {
        if ($pages - $edges > $end && $pages - $edges - $end != 1) {
            $html .= "<li><span>...</span></li>";
        } elseif ($pages - $edges - $end == 1) {
            $_end = $end + 1;
            $html .= "<li><a href='" . str_replace("{i}", $_end, $url) . "'>{$_end}</a></li>";
        }
        
        $_start = max($pages - $edges, $end) + 1;

        for ($i = $_start; $i <= $pages; $i++) {
            $html .= "<li><a href='" . str_replace("{i}", $i, $url) . "'>{$i}</a></li>";
        }
    }

    $html .= "</ul>";

    return $html;
}
