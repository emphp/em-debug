<?php
/**
 * @link http://www.Emframework.com/
 * @copyright Copyright (c) 2008 Em Software LLC
 * @license http://www.Emframework.com/license/
 */

namespace em\debug\actions\db;

use em\base\Action;
use em\debug\panels\DbPanel;
use em\web\HttpException;

/**
 * ExplainAction provides EXPLAIN information for SQL queries
 *
 * @author Laszlo <github@lvlconsultancy.nl>
 * @since 2.0.6
 */
class ExplainAction extends Action
{
    /**
     * @var DbPanel
     */
    public $panel;


    public function run($seq, $tag)
    {
        $this->controller->loadData($tag);

        $timings = $this->panel->calculateTimings();

        if (!isset($timings[$seq])) {
            throw new HttpException(404, 'Log message not found.');
        }

        $query = $timings[$seq]['info'];

        $results = $this->panel->getDb()->createCommand('EXPLAIN ' . $query)->queryAll();

        $output[] = '<table class="table"><thead><tr>' . implode(array_map(function($key) {
            return '<th>' . $key . '</th>';
        }, array_keys($results[0]))) . '</tr></thead><tbody>';

        foreach ($results as $result) {
            $output[] = '<tr>' . implode(array_map(function($value) {
                return '<td>' . (empty($value) ? 'NULL' : htmlspecialchars($value)) . '</td>';
            }, $result)) . '</tr>';
        }
        $output[] = '</tbody></table>';
        return implode($output);
    }
}
