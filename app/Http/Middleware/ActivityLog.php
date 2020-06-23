<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use App\Model\LogActivity;
class ActivityLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $routes_title = [
            'permissions'        => 'Список права доступа',
            'permission_delete'  => 'Удалить права доступа',
            'permission_save'    => 'Сохранить права доступа',
            'permission_get'     => 'Получить права доступа',
            'users'              => 'Список пользователей',
            'user_delete'        => 'Удалить пользователь',
            'user_save'          => 'Сохранить пользователь ',
            'user_get'           => 'Получить пользователь',
            'roles'              => 'Список ролей',
            'role_save'          => 'Сохранить роль',
            'role_get'           => 'Получить роль',
            'activity_log_list'  => 'Список логи действий пользователей',

            'Map.ekipaj_time'            => 'Время для обновления страницу экипажей',
            'Map.objects'                => 'Получить список объектов',
            'Map.ekipajes'               => 'Получить данные об экипажах за текущии момент',
            'Map.route_ekipaj_list'      => 'Получить список GPS Экипажей(Объектов)',
            'Map.trev_objects_curr_time' => 'Получить текущие тревоги',
            'Map.route_ekipajes_route'   => 'Получить данные о экипаже за выбранного промежуток времени',
            'Map.route_trev_object'      => 'Получить данные о тревоге за выбранного промежуток времени',
            'Map.ekipaj_settings'        => 'Список GPS Экипажей(Объектов)',
            'Map.ekipaj_edit'            => 'Изменить Экипаж',
            'Map.route_ekipaj_predict'   => 'Получить тревоги прошлой недели',
            'Map.object_only_objects'    => 'Получить Объекты по выбронному Организацию',
            'Map.object_tochka_otstoya'  => 'Получить данные об точках отстоя',

            'AESBASES.technics'     => 'Список AESBASES.dbo.technic',
            'AESBASES.technic_save' => 'Сохранить AESBASES.dbo.technic',
            'AESBASES.technic_get'  => 'Получить AESBASES.dbo.technic',
            'AESBASES.users'        => 'Список AESBASES.dbo.users',

            'KTMOTIS.roles'         => 'Список KTMOTIS.dbo.roles',
            'KTMOTIS.users'         => 'Список KTMOTIS.dbo.users',
            'KTMOTIS.user_save'     => 'Сохранить KTMOTIS.dbo.users',
            'KTMOTIS.user_get'      => 'Получить KTMOTIS.dbo.users',
            'KTMOTIS.technics'      => 'Список KTMOTIS.dbo.technics',
            'KTMOTIS.technic_save'  => 'Сохранить KTMOTIS.dbo.technics',
            'KTMOTIS.technic_get'   => 'Получить KTMOTIS.dbo.technics',
            'KTMOTIS.dbo.orgs'      => 'Список KTMOTIS.dbo.orgs',

            'sendSms'               => 'Отправил смс',
            'sendSmsLog'            => 'Получить смс логов',

            'object_card'            => 'КТМ карточка объекта -> Поиск',
            'object_card_report'      => 'КТМ карточка объекта -> Отчет',

            'reports.report1'        => 'Подключенные объекты -> Список',
            'reports.report1_print'  => 'Подключенные объекты -> Распечатать',
            'reports.report2'        => 'Выезды более 3х -> Список',
            'reports.report2_print'  => 'Выезды более 3х -> Распечатать',
            'reports.report3'        => 'Отчет по техникам -> Список',
            'reports.report3_print'  => 'Отчет по техникам -> Распечатать',
            'reports.report4'        => 'Разряд батареек -> Список',
            'reports.report4_print'  => 'Разряд батареек -> Распечатать',
            'reports.report5'        => 'Прибытие экипажей за время более 8 минут -> Список',
            'reports.report5_print'  => 'Прибытие экипажей за время более 8 минут -> Распечатать',
            'reports.report6'        => 'Отчет для Eurasian Bank -> Список',
            'reports.report6_print'  => 'Отчет для Eurasian Bank -> Распечатать',

            'ralarms'               => 'Заявки и тревоги -> Список',
            'ralarm_save'           => 'Заявки и тревоги -> Сохранить',
            'ralarm_get'            => 'Заявки и тревоги -> Получить',
            'ralarm_delete'         => 'Заявки и тревоги -> Удалить',
            'search_otis_number'    => 'Заявки и тревоги -> Поиск по номер Отиса',

            'mobile.search_by_otis_number'  => 'Мобильное приложение -> Поиск объекта -> ОТИС номер',
            'mobile.search_by_phone_number' => 'Мобильное приложение -> Поиск пользователя -> Поиск по номеру телефона',
            'mobile.search_view_object'     => 'Мобильное приложение -> Информация об объекта',
            'mobile.user_view_object'       => 'Мобильное приложение -> Информация о пользователе',
            'mobile.pin_search'             => 'Мобильное приложение -> Изменить ПИН код -> Поиск номер телефона',
            'mobile.pin_edit_password'      => 'Мобильное приложение -> Изменить ПИН код -> Изменить пин код'
        ];

        $route_name = $tickets->route()->getName();
        $title = ($routes_title[ $route_name ] ?? '') . ' - ' . url()->current();

        activity('Посещение страниц и API')
            ->withProperties(
                $tickets->all()
            )
            ->log($title);


        return $next($request);
    }
}
