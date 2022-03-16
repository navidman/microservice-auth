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
     *       @OA\Property(property="type", type="boolean", format="text", example="0 : already registered user or 1 : new user"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="right credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="status", type="integer", example=200),
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
     *                 example="error in fields",
     *              )
     *           )
     *        ),
     *       @OA\Property(property="status", type="integer", example=400),
     *       @OA\Property(property="message", type="string", example="wrong data"),
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
     *                 example="error in fields",
     *              )
     *           )
     *        ),
     *       @OA\Property(property="status", type="integer", example=400),
     *       @OA\Property(property="message", type="string", example="wrong data"),
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
     *       @OA\Property(property="data", type="array", collectionFormat="multi",
     *        @OA\Items(
     *         @OA\Property(property="token_type", type="string", example="Bearer"),
     *         @OA\Property(property="expires_in", type="string", example="172800"),
     *         @OA\Property(property="jwt_token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiYTU1ODg3MDUzMTVmMzc1ZGRiYWY5YzRhMmI3YTQ4YzVmY2NmM2IxZTQxZTcyZTBhMzAzNjU1Yzc0NzIzZTU"),
     *       @OA\Property(property="user", type="array", collectionFormat="multi",
     *        @OA\Items(
     *         @OA\Property(property="mobile", type="string", example="09139071587"),
     *         @OA\Property(property="created_at", type="timestamp", example="2022-03-15T20:10:12.000000Z"),
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
     *                 example="error is fields",
     *              )
     *           )
     *        ),
     *       @OA\Property(property="status", type="integer", example=400),
     *       @OA\Property(property="message", type="string", example="wrong data"),
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
     *       @OA\Property(property="message", type="string", example="Your token is valid!"),
     *        )
     *     ),
     * @OA\Response(
     *    response=401,
     *    description="Wrong access token",
     *    @OA\JsonContent(
     *       @OA\Property(property="status", type="integer", example=401),
     *       @OA\Property(property="message", type="string", example="Unauthorised"),
     *        )
     *     )
     * )
     */
}
