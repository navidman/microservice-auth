<?php


namespace App\Traits\Swagger\Auth;


trait Auth
{
    /**
     * @OA\Info(title="Auth-Microservice API", version="0.1")
     */
    /**
     * @OA\Post(
     * path="/auth/otp",
     * summary="Get Otp",
     * description="Get otp by mobile No.",
     * operationId="authGetOtp",
     * tags={"Auth"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user mobile",
     *    @OA\JsonContent(
     *       required={"mobile"},
     *       @OA\Property(property="mobile", type="string", format="text", example="09139071587"),
     *       @OA\Property(property="type", type="boolean", format="text", example="0 or 1"),
     *       @OA\Property(property="national_code", type="string", format="text", example="در صورتی که فیلد تایپ با مقدار 1 ارسال شده بود بدین معنی میباشد که کاربر درحال ثبت نام است و کد ملی باید ارسال شود و در غیر اینصورت نیازی به ارسال کد ملی نیست"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="right credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="status", type="integer", example=200),
     *       @OA\Property(property="message", type="string", example="رمز یکبار مصرف ارسال شد"),
     *        )
     *     ),
     * @OA\Response(
     *    response=400,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *        @OA\Property(
     *           property="errors",
     *           type="object",
     *           @OA\Property(
     *              property="field_name",
     *              type="array",
     *              collectionFormat="multi",
     *              @OA\Items(
     *                 type="string",
     *                 example="خطای مرتبط با فیلد  مورد نظر",
     *              )
     *           )
     *        ),
     *       @OA\Property(property="status", type="integer", example=400),
     *       @OA\Property(property="message", type="string", example="خطا در اطلاعات ورودی"),
     *        )
     *     )
     * )
     */

    /**
     * @OA\Post(
     * path="/auth/otp/resend",
     * summary="Resend Otp",
     * description="Resend otp by mobile No. (1 time every minute limitaion)",
     * operationId="authResendOtp",
     * tags={"Auth"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user mobile",
     *    @OA\JsonContent(
     *       required={"mobile"},
     *       @OA\Property(property="mobile", type="string", format="text", example="09139071587"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="right credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="status", type="integer", example=200),
     *       @OA\Property(property="message", type="string", example="رمز یکبار مصرف ارسال شد"),
     *        )
     *     ),
     * @OA\Response(
     *    response=400,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *        @OA\Property(
     *           property="errors",
     *           type="object",
     *           @OA\Property(
     *              property="field_name",
     *              type="array",
     *              collectionFormat="multi",
     *              @OA\Items(
     *                 type="string",
     *                 example="خطای مرتبط با فیلد  مورد نظر",
     *              )
     *           )
     *        ),
     *       @OA\Property(property="status", type="integer", example=400),
     *       @OA\Property(property="message", type="string", example="خطا در اطلاعات ورودی"),
     *        )
     *     )
     * )
     */


    /**
     * @OA\Post(
     * path="/auth/token",
     * summary="GetToken",
     * description="Login by Mobile No. and otp",
     * operationId="authLogin",
     * tags={"Auth"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user mobile and otp",
     *    @OA\JsonContent(
     *       required={"mobile", "otp"},
     *       @OA\Property(property="mobile", type="string", format="text", example="09139071587"),
     *       @OA\Property(property="otp", type="string", format="text", example="123456"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="right credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="عملیات با موفقیت انجام شد"),
     *       @OA\Property(property="data", type="array", collectionFormat="multi",
     *        @OA\Items(
     *         @OA\Property(property="token_type", type="string", example="Bearer"),
     *         @OA\Property(property="expires_in", type="string", example="172800"),
     *         @OA\Property(property="access_token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiYTU1ODg3MDUzMTVmMzc1ZGRiYWY5YzRhMmI3YTQ4YzVmY2NmM2IxZTQxZTcyZTBhMzAzNjU1Yzc0NzIzZTU"),
     *         @OA\Property(property="refresh_token", type="string", example="def502008b3bd9cc76b139e6c4dd7d6b72d23684984ef2a4d9e03f96c2e1a6817be0f55b0b2659953cb3506b8ad0080aa0c38e983eb80066ee5564561f02c19203f0efcf3ce86791a05a0d44d15fbfd"),
     *       @OA\Property(property="user", type="array", collectionFormat="multi",
     *        @OA\Items(
     *         @OA\Property(property="name", type="string", example="نوید منصوری"),
     *         @OA\Property(property="avatar", type="string", example="image.png"),
     *         @OA\Property(property="mobile", type="string", example="09139071587"),
     *         @OA\Property(property="email", type="string", example="email"),
     *         @OA\Property(property="verified_at", type="timestamp", example="اگر این فیلد پر شده باشد کاربر به داشبورد هدادیت میشود  و اگر خالی باشد به صفحه ی تکمبل مشخصات کاربری هدایت میشود."),
     *         @OA\Property(property="register_submitted_at", type="timestamp", example="اگر فیلد بالایی پر نشده بود و کاربر به صفحه تکمیل مشخصات هدایت شد با توجه به پر بودن یا نبودن این فیلد به کاربر اجازه تغییر و تکمیل اطلاعت کاربری داه میشود یا صرفا در انتظار تایید شدن اطلاعات نمایش داده میشود"),
     *         @OA\Property(property="terminals", type="array", collectionFormat="multi",
     *          @OA\Items(
     *           @OA\Property(property="name_fa", type="string", example="میلیونا"),
     *           @OA\Property(property="website", type="string", example="Milyoona.com"),
     *           @OA\Property(property="active", type="string", example="0 or 1"),
     *              )
     *       ),
     *        )
     *     ),
     *              )
     *       ),
     *       @OA\Property(property="status", type="integer", example=200),
     *        )
     *     ),
     * @OA\Response(
     *    response=400,
     *    description="Wrong Code No.",
     *    @OA\JsonContent(
     *        @OA\Property(
     *           property="errors",
     *           type="object",
     *           @OA\Property(
     *              property="field_name",
     *              type="array",
     *              collectionFormat="multi",
     *              @OA\Items(
     *                 type="string",
     *                 example="خطای مرتبط با فیلد مورد نظر",
     *              )
     *           )
     *        ),
     *       @OA\Property(property="status", type="integer", example=400),
     *       @OA\Property(property="message", type="string", example="خطا در اطلاعات ورودی"),
     *        )
     *     )
     * )
     */


    /**
     * @OA\Get(
     * path="/auth/token/check",
     * summary="Check Token",
     * description="Check User's Token",
     * operationId="tokenCheck",
     * tags={"Auth"},
     * @OA\Response(
     *    response=200,
     *    description="Sucess",
     *    @OA\JsonContent(
     *       @OA\Property(property="status", type="integer", example=200),
     *       @OA\Property(property="message", type="string", example="توکن شما معتبر است"),
     *        )
     *     ),
     * @OA\Response(
     *    response=401,
     *    description="Wrong access token",
     *    @OA\JsonContent(
     *       @OA\Property(property="status", type="integer", example=401),
     *       @OA\Property(property="message", type="string", example="کاربر غیر مجاز است"),
     *        )
     *     )
     * )
     */
}
