<?php

// Home
Breadcrumbs::register('tracker_index', function($breadcrumbs)
{
    $breadcrumbs->push('Треккер', route('index'));
});

// Home
Breadcrumbs::register('tracker_popular', function($breadcrumbs)
{
    $breadcrumbs->parent('tracker_index');
    $breadcrumbs->push('Популярные публикации', route('popular'));
});

// Home > Tracker > [Create]
Breadcrumbs::register('tracker_create', function($breadcrumbs, $create)
{
    $breadcrumbs->parent('tracker_index');
    $breadcrumbs->push($create, route('create', $create));
});

// Home > Tracker > [Show]
Breadcrumbs::register('tracker_show', function($breadcrumbs, $show)
{
    $breadcrumbs->parent('tracker_index');
    $breadcrumbs->push($show->title, route('show', $show->id));
});

// Home > Tracker > [Edit]
Breadcrumbs::register('tracker_edit', function($breadcrumbs, $edit)
{
    $breadcrumbs->parent('tracker_show', $edit);
    $breadcrumbs->push('Редактирование публикации', route('edit', $edit->id));
});